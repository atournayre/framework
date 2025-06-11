<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Symfony\Subscriber;

use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Contracts\Persistance\AllowFlushInterface;
use Atournayre\Symfony\Subscriber\DoctrineTransactionSubscriber;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class DoctrineTransactionSubscriberTest extends TestCase
{
    private EntityManagerInterface|MockObject $entityManager;
    private LoggerInterface|MockObject $logger;
    private Connection|MockObject $connection;
    private DoctrineTransactionSubscriber $subscriber;

    protected function setUp(): void
    {
        $this->connection = $this->createMock(Connection::class);

        $this->entityManager = $this->createMock(EntityManagerInterface::class);
        $this->entityManager->method('getConnection')->willReturn($this->connection);

        $this->logger = $this->createMock(LoggerInterface::class);

        $this->subscriber = new DoctrineTransactionSubscriber(
            $this->entityManager,
            $this->logger
        );
    }

    public function testGetSubscribedEvents(): void
    {
        $events = DoctrineTransactionSubscriber::getSubscribedEvents();

        self::assertArrayHasKey(KernelEvents::CONTROLLER, $events);
        self::assertArrayHasKey(KernelEvents::RESPONSE, $events);
        self::assertArrayHasKey(KernelEvents::EXCEPTION, $events);

        self::assertEquals(['startTransaction', 100], $events[KernelEvents::CONTROLLER]);
        self::assertEquals(['commitTransaction', -100], $events[KernelEvents::RESPONSE]);
        self::assertEquals(['rollbackTransaction', 100], $events[KernelEvents::EXCEPTION]);
    }

    public function testStartTransactionSkipsNonMainRequests(): void
    {
        $event = $this->createControllerEvent(false);

        $this->entityManager->expects(self::never())->method('beginTransaction');

        $this->subscriber->startTransaction($event);
    }

    public function testStartTransactionSkipsNonArrayControllers(): void
    {
        $event = $this->createControllerEvent(true, function () {});

        $this->entityManager->expects(self::never())->method('beginTransaction');

        $this->subscriber->startTransaction($event);
    }

    public function testStartTransactionSkipsNonAllowFlushControllers(): void
    {
        $controller = new class {
            public function method()
            {
            }
        };
        $event = $this->createControllerEvent(true, [$controller, 'method']);

        $this->entityManager->expects(self::never())->method('beginTransaction');

        $this->subscriber->startTransaction($event);
    }

    public function testStartTransactionBeginsTransactionForAllowFlushControllers(): void
    {
        $controller = $this->createMock(AllowFlushInterface::class);
        $event = $this->createControllerEvent(true, [$controller, 'method']);

        $this->entityManager->expects(self::once())->method('beginTransaction');

        $this->subscriber->startTransaction($event);
    }

    public function testCommitTransactionSkipsNonMainRequests(): void
    {
        $event = $this->createResponseEvent(false);

        $this->entityManager->expects(self::never())->method('flush');
        $this->entityManager->expects(self::never())->method('commit');

        $this->subscriber->commitTransaction($event);
    }

    public function testCommitTransactionSkipsNonValidControllers(): void
    {
        $event = $this->createResponseEvent(true, 'invalid_controller');

        $this->entityManager->expects(self::never())->method('flush');
        $this->entityManager->expects(self::never())->method('commit');

        $this->subscriber->commitTransaction($event);
    }

    public function testCommitTransactionCommitsForValidControllers(): void
    {
        $controller = $this->createMock(AllowFlushInterface::class);
        $event = $this->createResponseEvent(true, [$controller, 'method']);

        $this->entityManager->expects(self::once())->method('flush');
        $this->entityManager->expects(self::once())->method('commit');

        $this->subscriber->commitTransaction($event);
    }

    public function testCommitTransactionRollsBackOnException(): void
    {
        $controller = $this->createMock(AllowFlushInterface::class);
        $event = $this->createResponseEvent(true, [$controller, 'method']);

        $this->entityManager->expects(self::once())->method('flush')
            ->willThrowException(new \Exception('Test exception'))
        ;

        $this->connection->expects(self::once())->method('isTransactionActive')
            ->willReturn(true)
        ;

        $this->entityManager->expects(self::once())->method('rollback');

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Test exception');

        $this->subscriber->commitTransaction($event);
    }

    public function testRollbackTransactionSkipsNonMainRequests(): void
    {
        $event = $this->createExceptionEvent(false);

        $this->entityManager->expects(self::never())->method('rollback');

        $this->subscriber->rollbackTransaction($event);
    }

    public function testRollbackTransactionSkipsNonValidControllers(): void
    {
        $event = $this->createExceptionEvent(true, 'invalid_controller');

        $this->entityManager->expects(self::never())->method('rollback');

        $this->subscriber->rollbackTransaction($event);
    }

    public function testRollbackTransactionRollsBackForValidControllers(): void
    {
        $controller = $this->createMock(AllowFlushInterface::class);
        $event = $this->createExceptionEvent(true, [$controller, 'method']);

        $this->connection->expects(self::once())->method('isTransactionActive')
            ->willReturn(true)
        ;

        $this->entityManager->expects(self::once())->method('rollback');

        $this->subscriber->rollbackTransaction($event);
    }

    public function testRollbackSkipsIfNoActiveTransaction(): void
    {
        $controller = $this->createMock(AllowFlushInterface::class);
        $event = $this->createExceptionEvent(true, [$controller, 'method']);

        $this->connection->expects(self::once())->method('isTransactionActive')
            ->willReturn(false)
        ;

        $this->entityManager->expects(self::never())->method('rollback');

        $this->subscriber->rollbackTransaction($event);
    }

    private function createControllerEvent(bool $isMainRequest, mixed $controller = null): ControllerEvent
    {
        $kernel = $this->createMock(HttpKernelInterface::class);
        $request = $this->createMock(Request::class);

        $event = new ControllerEvent(
            $kernel,
            $controller ?? function () {},
            $request,
            $isMainRequest ? HttpKernelInterface::MAIN_REQUEST : HttpKernelInterface::SUB_REQUEST
        );

        return $event;
    }

    private function createResponseEvent(bool $isMainRequest, mixed $controller = null): ResponseEvent
    {
        $kernel = $this->createMock(HttpKernelInterface::class);
        $request = new Request();
        $response = new Response();

        if (null !== $controller) {
            $request->attributes->set('_controller', $controller);
        }

        $event = new ResponseEvent(
            $kernel,
            $request,
            $isMainRequest ? HttpKernelInterface::MAIN_REQUEST : HttpKernelInterface::SUB_REQUEST,
            $response
        );

        return $event;
    }

    private function createExceptionEvent(bool $isMainRequest, mixed $controller = null): ExceptionEvent
    {
        $kernel = $this->createMock(HttpKernelInterface::class);
        $request = new Request();
        $throwable = new \Exception('Test exception');

        if (null !== $controller) {
            $request->attributes->set('_controller', $controller);
        }

        $event = new ExceptionEvent(
            $kernel,
            $request,
            $isMainRequest ? HttpKernelInterface::MAIN_REQUEST : HttpKernelInterface::SUB_REQUEST,
            $throwable
        );

        return $event;
    }
}
