<?php

declare(strict_types=1);

namespace Atournayre\Contracts\CommandBus;

/**
 * Interface for synchronous command messages.
 *
 * This interface is used to tag command messages that need to be executed synchronously.
 * Commands implementing this interface will be processed immediately without being queued.
 */
interface SyncCommandInterface
{
}
