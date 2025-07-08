<?php

declare(strict_types=1);

namespace Atournayre\Contracts\CommandBus;

/**
 * Interface for command messages.
 *
 * This interface is used to tag command messages for Symfony Messenger.
 * Commands implementing this interface will be automatically associated
 * with the async queue in Messenger configuration.
 */
interface CommandInterface
{
}
