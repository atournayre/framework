<?php

declare(strict_types=1);

namespace Atournayre\Common\Persistance\Command;

use Atournayre\Common\AbstractCommandEvent;
use Atournayre\Contracts\CommandBus\SyncCommandInterface;

/**
 * Command to remove an object from the database.
 */
final class DatabaseRemoveCommand extends AbstractCommandEvent implements SyncCommandInterface
{
    private function __construct(private readonly object $object)
    {
    }

    public static function new(object $object): self
    {
        return new self(object: $object);
    }

    public function object(): object
    {
        return $this->object;
    }
}
