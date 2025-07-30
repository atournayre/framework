<?php

declare(strict_types=1);

namespace Atournayre\Common\Persistance\Command;

use Atournayre\Common\AbstractCommandEvent;
use Atournayre\Contracts\CommandBus\SyncCommandInterface;

/**
 * Command to flush all changes to the database.
 */
final class DatabaseFlushCommand extends AbstractCommandEvent implements SyncCommandInterface
{
    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }
}
