<?php

declare(strict_types=1);

namespace Atournayre\Contracts\CommandBus;

/**
 * Interface for command bus implementations.
 *
 * The command bus is responsible for dispatching commands to their appropriate handlers.
 * Commands are typically used for write operations and side effects.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface CommandBusInterface
{
    /**
     * Dispatches a command to its handler.
     *
     * @param CommandInterface $command The command to dispatch
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function dispatch(CommandInterface $command): void;
}
