<?php

declare(strict_types=1);

namespace Atournayre\Common;

use Atournayre\Contracts\CommandBus\CommandBusInterface;
use Atournayre\Traits\CommandMessageTrait;

/**
 * Abstract base class for command events.
 *
 * This class provides a fluent interface for command creation and dispatching.
 * Instead of using $commandBus->dispatch(new MyCommand()), you can now use
 * MyCommand::new()->dispatch($commandBus).
 */
abstract class AbstractCommandEvent implements CommandBusInterface
{
    use CommandMessageTrait;
}
