<?php

declare(strict_types=1);

namespace Atournayre\Traits;

use Atournayre\Contracts\CommandBus\CommandBusInterface;

/**
 * Trait for command message functionality.
 *
 * This trait provides a command() method that can be used by classes
 * implementing CommandInterface to dispatch themselves through a command bus.
 */
trait CommandMessageTrait
{
    /**
     * Dispatches this command through the provided command bus.
     *
     * @param CommandBusInterface $bus The command bus to use for dispatching
     */
    public function command(CommandBusInterface $bus): void
    {
        $bus->dispatch($this);
    }
}
