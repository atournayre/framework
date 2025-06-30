<?php

declare(strict_types=1);

namespace Atournayre\Contracts\CommandBus;

/**
 * Interface for query messages.
 *
 * This interface is used to tag query messages for Symfony Messenger.
 * Queries implementing this interface will be automatically associated
 * with the sync queue in Messenger configuration.
 */
interface QueryInterface
{
}
