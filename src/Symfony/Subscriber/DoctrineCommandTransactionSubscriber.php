<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Subscriber;

use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Contracts\Persistance\AllowFlushInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Event\ConsoleErrorEvent;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final readonly class DoctrineCommandTransactionSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private LoggerInterface $logger,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ConsoleEvents::COMMAND => ['startTransaction', 100],
            ConsoleEvents::TERMINATE => ['commitTransaction', -100],
            ConsoleEvents::ERROR => ['rollbackTransaction', 100],
        ];
    }

    public function startTransaction(ConsoleCommandEvent $event): void
    {
        $this->logger->setLoggerIdentifier(self::class);

        $command = $event->getCommand();

        if (!$command instanceof Command) {
            return;
        }

        // Only start transaction if command implements AllowFlushInterface
        if ($this->isAllowFlushCommand($command)) {
            $this->logger->start(['command' => $command->getName() ?? 'unknown']);
            $this->entityManager->beginTransaction();
            $this->logger->debug('Transaction started', ['command' => $command->getName() ?? 'unknown']);
        }
    }

    private function isAllowFlushCommand(Command $command): bool
    {
        return $command instanceof AllowFlushInterface;
    }

    /**
     * @throws \Throwable
     */
    public function commitTransaction(ConsoleTerminateEvent $event): void
    {
        $command = $event->getCommand();

        if (!$command instanceof Command || !$this->isAllowFlushCommand($command)) {
            return;
        }

        $commandName = $command->getName() ?? 'unknown';
        $context = ['command' => $commandName, 'exitCode' => $event->getExitCode()];

        try {
            $this->logger->debug('Flushing changes', $context);
            $this->entityManager->flush();
            $this->logger->debug('Committing transaction', $context);
            $this->entityManager->commit();
            $this->logger->success($context);
            $this->logger->end($context);
        } catch (\Throwable $throwable) {
            $this->logger->exception($throwable, $context);
            $this->rollback();
            throw $throwable;
        }
    }

    public function rollbackTransaction(ConsoleErrorEvent $event): void
    {
        $command = $event->getCommand();

        if (!$command instanceof Command || !$this->isAllowFlushCommand($command)) {
            return;
        }

        $commandName = $command->getName() ?? 'unknown';
        $context = [
            'command' => $commandName,
            'error' => $event->getError()->getMessage(),
        ];

        $this->logger->error('Rolling back transaction due to error', $context);
        $this->rollback();
        $this->logger->failFast($context);
        $this->logger->end($context);
    }

    private function rollback(): void
    {
        if ($this->entityManager->getConnection()->isTransactionActive()) {
            $this->logger->debug('Rolling back transaction');
            $this->entityManager->rollback();
        }
    }
}
