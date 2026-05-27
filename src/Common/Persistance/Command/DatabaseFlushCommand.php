<?php

declare(strict_types=1);

namespace Atournayre\Common\Persistance\Command;

use Atournayre\Common\AbstractCommandEvent;
use Atournayre\Contracts\CommandBus\SyncCommandInterface;

/**
 * Command to flush all changes to the database.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class DatabaseFlushCommand extends AbstractCommandEvent implements SyncCommandInterface
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }
}
