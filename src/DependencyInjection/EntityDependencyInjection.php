<?php

declare(strict_types=1);

namespace Atournayre\DependencyInjection;

use Atournayre\Contracts\CommandBus\CommandBusInterface;
use Atournayre\Contracts\CommandBus\QueryBusInterface;
use Atournayre\Contracts\DependencyInjection\DependencyInjectionInterface;
use Psr\Log\LoggerInterface;

/**
 * Entity dependency injection implementation.
 *
 * This class provides access to commonly used services
 * that can be injected into entities and other objects.
 */
final class EntityDependencyInjection implements DependencyInjectionInterface
{
    public function __construct(
        private readonly CommandBusInterface $commandBus,
        private readonly QueryBusInterface $queryBus,
        private readonly LoggerInterface $logger,
    ) {
    }

    /**
     * Gets the command bus service.
     *
     * @return CommandBusInterface The command bus instance
     */
    public function commandBus(): CommandBusInterface
    {
        return $this->commandBus;
    }

    /**
     * Gets the query bus service.
     *
     * @return QueryBusInterface The query bus instance
     */
    public function queryBus(): QueryBusInterface
    {
        return $this->queryBus;
    }

    /**
     * Gets the logger service.
     *
     * @return LoggerInterface The logger instance
     */
    public function logger(): LoggerInterface
    {
        return $this->logger;
    }
}
