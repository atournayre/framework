<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\DependencyInjection;

use Atournayre\Contracts\CommandBus\CommandBusInterface;
use Atournayre\Contracts\CommandBus\QueryBusInterface;
use Atournayre\DependencyInjection\EntityDependencyInjection;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

final class EntityDependencyInjectionTest extends TestCase
{
    private CommandBusInterface $commandBus;
    private QueryBusInterface $queryBus;
    private LoggerInterface $logger;
    private EntityDependencyInjection $entityDependencyInjection;

    protected function setUp(): void
    {
        $this->commandBus = $this->createMock(CommandBusInterface::class);
        $this->queryBus = $this->createMock(QueryBusInterface::class);
        $this->logger = $this->createMock(LoggerInterface::class);

        $this->entityDependencyInjection = new EntityDependencyInjection(
            $this->commandBus,
            $this->queryBus,
            $this->logger
        );
    }

    public function testCommandBusReturnsInjectedCommandBus(): void
    {
        // Act
        $result = $this->entityDependencyInjection->commandBus();

        // Assert
        self::assertSame($this->commandBus, $result);
    }

    public function testQueryBusReturnsInjectedQueryBus(): void
    {
        // Act
        $result = $this->entityDependencyInjection->queryBus();

        // Assert
        self::assertSame($this->queryBus, $result);
    }

    public function testLoggerReturnsInjectedLogger(): void
    {
        // Act
        $result = $this->entityDependencyInjection->logger();

        // Assert
        self::assertSame($this->logger, $result);
    }
}
