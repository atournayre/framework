<?php

declare(strict_types=1);

namespace Atournayre\Contracts\DependencyInjection;

use Atournayre\Contracts\CommandBus\CommandBusInterface;
use Atournayre\Contracts\CommandBus\QueryBusInterface;
use Psr\Log\LoggerInterface;

/**
 * Interface for dependency injection container.
 *
 * This interface provides access to commonly used services
 * that can be injected into entities and other objects.
 */
interface DependencyInjectionInterface
{
    /**
     * Gets the command bus service.
     *
     * @return CommandBusInterface The command bus instance
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function commandBus(): CommandBusInterface;

    /**
     * Gets the query bus service.
     *
     * @return QueryBusInterface The query bus instance
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function queryBus(): QueryBusInterface;

    /**
     * Gets the logger service.
     *
     * @return LoggerInterface The logger instance
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function logger(): LoggerInterface;
}
