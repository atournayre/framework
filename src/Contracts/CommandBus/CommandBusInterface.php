<?php

declare(strict_types=1);

namespace Atournayre\Contracts\CommandBus;

/**
 * Interface for command bus implementations.
 *
 * The command bus is responsible for dispatching commands to their appropriate handlers.
 * Commands are typically used for write operations and side effects.
 */
interface CommandBusInterface
{
    /**
     * Dispatches a command to its handler.
     *
     * @param CommandInterface $command The command to dispatch
     *
     * @return void
     */
    public function dispatch(CommandInterface $command): void;
}
