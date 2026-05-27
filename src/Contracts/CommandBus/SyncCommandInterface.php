<?php

declare(strict_types=1);

namespace Atournayre\Contracts\CommandBus;

/**
 * Interface for synchronous command messages.
 *
 * This interface is used to tag command messages that need to be executed synchronously.
 * Commands implementing this interface will be processed immediately without being queued.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface SyncCommandInterface
{
}
