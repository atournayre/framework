<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Symfony\CommandBus;

use Atournayre\Contracts\CommandBus\QueryInterface;
use Atournayre\Symfony\CommandBus\SymfonyQueryBusAdapter;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

final class SymfonyQueryBusAdapterTest extends TestCase
{
    public function testAskCallsMessageBusDispatchAndReturnsResult(): void
    {
        // Arrange
        $messageBus = $this->createMock(MessageBusInterface::class);
        $query = $this->createMock(QueryInterface::class);
        $adapter = new SymfonyQueryBusAdapter($messageBus);
        $expectedResult = 'test result';

        // Create real objects since they are final classes
        $handledStamp = new HandledStamp($expectedResult, 'test_handler');
        $envelope = new Envelope($query, [$handledStamp]);

        // Assert
        $messageBus->expects(self::once())
            ->method('dispatch')
            ->with(self::identicalTo($query))
            ->willReturn($envelope)
        ;

        // Act
        $result = $adapter->ask($query);

        // Assert
        self::assertSame($expectedResult, $result);
    }

    public function testAskReturnsNullWhenNoHandledStamp(): void
    {
        // Arrange
        $messageBus = $this->createMock(MessageBusInterface::class);
        $query = $this->createMock(QueryInterface::class);
        $adapter = new SymfonyQueryBusAdapter($messageBus);

        // Create real envelope without HandledStamp
        $envelope = new Envelope($query);

        // Assert
        $messageBus->expects(self::once())
            ->method('dispatch')
            ->with(self::identicalTo($query))
            ->willReturn($envelope)
        ;

        // Act
        $result = $adapter->ask($query);

        // Assert
        self::assertNull($result);
    }
}
