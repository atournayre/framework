<?php

declare(strict_types=1);

namespace Atournayre\Common\Persistance\Command;

use Atournayre\Common\AbstractCommandEvent;
use Atournayre\Contracts\CommandBus\SyncCommandInterface;

/**
 * Command to persist an object to the database.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class DatabasePersistCommand extends AbstractCommandEvent implements SyncCommandInterface
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(private readonly object $object)
    {
    }

    public static function new(object $object): self
    {
        return new self(object: $object);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function object(): object
    {
        return $this->object;
    }
}
