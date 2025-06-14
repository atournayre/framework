<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Symfony\Subscriber;

use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Contracts\Persistance\AllowFlushInterface;
use Atournayre\Symfony\Subscriber\DoctrineCommandTransactionSubscriber;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DoctrineCommandTransactionSubscriberTest extends TestCase
{
    private readonly EntityManagerInterface|MockObject $entityManager;
    private readonly LoggerInterface|MockObject $logger;
    private readonly Connection|MockObject $connection;
    private readonly DoctrineCommandTransactionSubscriber $subscriber;

    protected function setUp(): void
    {
        $this->connection = $this->createMock(Connection::class);

        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->entityManager->method('getConnection')->willReturn($this->connection);

        $this->logger = $this->createMock(LoggerInterface::class);

        $this->subscriber = new DoctrineCommandTransactionSubscriber(
            $this->entityManager,
            $this->logger
        );
    }

    public function testGetSubscribedEvents(): void
    {
        $events = DoctrineCommandTransactionSubscriber::getSubscribedEvents();

        self::assertArrayHasKey(ConsoleEvents::COMMAND, $events);
        self::assertArrayHasKey(ConsoleEvents::TERMINATE, $events);
        self::assertArrayHasKey(ConsoleEvents::ERROR, $events);

        self::assertEquals(['startTransaction', 100], $events[ConsoleEvents::COMMAND]);
        self::assertEquals(['commitTransaction', -100], $events[ConsoleEvents::TERMINATE]);
        self::assertEquals(['rollbackTransaction', 100], $events[ConsoleEvents::ERROR]);
    }

    public function testStartTransactionSkipsNonCommandEvents(): void
    {
        $event = $this->createEmptyConsoleCommandEvent();

        $this->entityManager->expects(self::never())->method('beginTransaction');

        $this->subscriber->startTransaction($event);
    }

    public function testStartTransactionSkipsNonAllowFlushCommands(): void
    {
        $command = $this->createMock(Command::class);
        $event = $this->createConsoleCommandEvent($command);

        $this->entityManager->expects(self::never())->method('beginTransaction');

        $this->subscriber->startTransaction($event);
    }

    public function testStartTransactionBeginsTransactionForAllowFlushCommands(): void
    {
        $command = $this->createMock(AllowFlushCommand::class);
        $command->method('getName')->willReturn('test:command');
        $event = $this->createConsoleCommandEvent($command);

        $this->logger->expects(self::once())->method('setLoggerIdentifier')
            ->with(DoctrineCommandTransactionSubscriber::class)
        ;
        $this->logger->expects(self::once())->method('start')
            ->with(['command' => 'test:command'])
        ;
        $this->entityManager->expects(self::once())->method('beginTransaction');
        $this->logger->expects(self::once())->method('debug')
            ->with('Transaction started', ['command' => 'test:command'])
        ;

        $this->subscriber->startTransaction($event);
    }

    public function testCommitTransactionSkipsNonCommandEvents(): void
    {
        $event = $this->createEmptyConsoleTerminateEvent();

        $this->entityManager->expects(self::never())->method('flush');
        $this->entityManager->expects(self::never())->method('commit');

        $this->subscriber->commitTransaction($event);
    }

    public function testCommitTransactionSkipsNonAllowFlushCommands(): void
    {
        $command = $this->createMock(Command::class);
        $event = $this->createConsoleTerminateEvent($command);

        $this->entityManager->expects(self::never())->method('flush');
        $this->entityManager->expects(self::never())->method('commit');

        $this->subscriber->commitTransaction($event);
    }

    public function testCommitTransactionCommitsForAllowFlushCommands(): void
    {
        $command = $this->createMock(AllowFlushCommand::class);
        $command->method('getName')->willReturn('test:command');
        $event = $this->createConsoleTerminateEvent($command, 0);

        // @phpstan-ignore-next-line
        $this->logger->expects(self::exactly(2))->method('debug')
            ->withConsecutive(
                ['Flushing changes', ['command' => 'test:command', 'exitCode' => 0]],
                ['Committing transaction', ['command' => 'test:command', 'exitCode' => 0]]
            )
        ;
        $this->entityManager->expects(self::once())->method('flush');
        $this->entityManager->expects(self::once())->method('commit');
        $this->logger->expects(self::once())->method('success')
            ->with(['command' => 'test:command', 'exitCode' => 0])
        ;
        $this->logger->expects(self::once())->method('end')
            ->with(['command' => 'test:command', 'exitCode' => 0])
        ;

        $this->subscriber->commitTransaction($event);
    }

    public function testCommitTransactionRollsBackOnException(): void
    {
        $command = $this->createMock(AllowFlushCommand::class);
        $command->method('getName')->willReturn('test:command');
        $event = $this->createConsoleTerminateEvent($command, 0);

        $this->entityManager->expects(self::once())->method('flush')
            ->willThrowException(new \Exception('Test exception'))
        ;

        $this->connection->expects(self::once())->method('isTransactionActive')
            ->willReturn(true)
        ;

        $this->logger->expects(self::once())->method('exception')
            ->with(
                self::callback(function (\Exception $e) {
                    return 'Test exception' === $e->getMessage();
                }),
                ['command' => 'test:command', 'exitCode' => 0]
            )
        ;

        $this->entityManager->expects(self::once())->method('rollback');

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Test exception');

        $this->subscriber->commitTransaction($event);
    }

    public function testRollbackTransactionSkipsNonCommandEvents(): void
    {
        $event = $this->createEmptyConsoleErrorEvent();

        $this->entityManager->expects(self::never())->method('rollback');

        $this->subscriber->rollbackTransaction($event);
    }

    public function testRollbackTransactionSkipsNonAllowFlushCommands(): void
    {
        $command = $this->createMock(Command::class);
        $event = $this->createConsoleErrorEvent($command, new \Exception('Test error'));

        $this->entityManager->expects(self::never())->method('rollback');

        $this->subscriber->rollbackTransaction($event);
    }

    public function testRollbackTransactionRollsBackForAllowFlushCommands(): void
    {
        $command = $this->createMock(AllowFlushCommand::class);
        $command->method('getName')->willReturn('test:command');
        $event = $this->createConsoleErrorEvent($command, new \Exception('Test error'));

        $this->logger->expects(self::once())->method('error')
            ->with('Rolling back transaction due to error', ['command' => 'test:command', 'error' => 'Test error'])
        ;

        $this->connection->expects(self::once())->method('isTransactionActive')
            ->willReturn(true)
        ;

        $this->logger->expects(self::once())->method('debug')
            ->with('Rolling back transaction')
        ;
        $this->entityManager->expects(self::once())->method('rollback');
        $this->logger->expects(self::once())->method('failFast')
            ->with(['command' => 'test:command', 'error' => 'Test error'])
        ;
        $this->logger->expects(self::once())->method('end')
            ->with(['command' => 'test:command', 'error' => 'Test error'])
        ;

        $this->subscriber->rollbackTransaction($event);
    }

    public function testRollbackSkipsIfNoActiveTransaction(): void
    {
        $command = $this->createMock(AllowFlushCommand::class);
        $command->method('getName')->willReturn('test:command');
        $event = $this->createConsoleErrorEvent($command, new \Exception('Test error'));

        $this->connection->expects(self::once())->method('isTransactionActive')
            ->willReturn(false)
        ;

        $this->entityManager->expects(self::never())->method('rollback');

        $this->subscriber->rollbackTransaction($event);
    }

    private function createConsoleCommandEvent(Command $command): ConsoleCommandEvent
    {
        $input = $this->createMock(InputInterface::class);
        $output = $this->createMock(OutputInterface::class);

        return new ConsoleCommandEvent($command, $input, $output);
    }

    private function createEmptyConsoleCommandEvent(): ConsoleCommandEvent
    {
        $input = $this->createMock(InputInterface::class);
        $output = $this->createMock(OutputInterface::class);

        return new ConsoleCommandEvent(null, $input, $output);
    }

    private function createConsoleTerminateEvent(Command $command, int $exitCode = 0): ConsoleTerminateEvent
    {
        $input = $this->createMock(InputInterface::class);
        $output = $this->createMock(OutputInterface::class);

        return new ConsoleTerminateEvent($command, $input, $output, $exitCode);
    }

    private function createEmptyConsoleTerminateEvent(int $exitCode = 0): ConsoleTerminateEvent
    {
        $input = $this->createMock(InputInterface::class);
        $output = $this->createMock(OutputInterface::class);
        $command = $this->createMock(Command::class);

        return new ConsoleTerminateEvent($command, $input, $output, $exitCode);
    }

    private function createConsoleErrorEvent(Command $command, \Throwable $error): ConsoleErrorEvent
    {
        $input = $this->createMock(InputInterface::class);
        $output = $this->createMock(OutputInterface::class);

        return new ConsoleErrorEvent($input, $output, $error, $command);
    }

    private function createEmptyConsoleErrorEvent(): ConsoleErrorEvent
    {
        $input = $this->createMock(InputInterface::class);
        $output = $this->createMock(OutputInterface::class);
        $error = new \Exception('Test error');

        return new ConsoleErrorEvent($input, $output, $error, null);
    }
}

/**
 * Helper class that implements both Command and AllowFlushInterface for testing.
 */
abstract class AllowFlushCommand extends Command implements AllowFlushInterface
{
}
