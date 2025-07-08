<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Symfony\CommandBus;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\CommandBus\CommandInterface;
use Atournayre\Symfony\CommandBus\SymfonyCommandBusAdapter;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;

final class SymfonyCommandBusAdapterTest extends TestCase
{
    public function testDispatchCallsMessageBusDispatch(): void
    {
        // Arrange
        $messageBus = $this->createMock(MessageBusInterface::class);
        $command = $this->createMock(CommandInterface::class);
        $adapter = new SymfonyCommandBusAdapter($messageBus);

        // Create a real envelope since Envelope is final
        $envelope = new Envelope($command);

        // Assert
        $messageBus->expects(self::once())
            ->method('dispatch')
            ->with(self::identicalTo($command))
            ->willReturn($envelope)
        ;

        // Act
        $adapter->dispatch($command);
    }

    public function testDispatchWrapsMessengerExceptionInRuntimeException(): void
    {
        // Arrange
        $messageBus = $this->createMock(MessageBusInterface::class);
        $command = $this->createMock(CommandInterface::class);
        $adapter = new SymfonyCommandBusAdapter($messageBus);
        $messengerException = $this->createMock(ExceptionInterface::class);

        // Assert
        $messageBus->expects(self::once())
            ->method('dispatch')
            ->with(self::identicalTo($command))
            ->willThrowException($messengerException)
        ;

        $this->expectException(RuntimeException::class);

        // Act
        $adapter->dispatch($command);
    }
}
