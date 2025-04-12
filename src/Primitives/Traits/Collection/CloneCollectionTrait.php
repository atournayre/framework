<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CloneCollectionInterface;

/**
 * Trait CloneCollectionTrait.
 *
 * @see CloneCollectionInterface
 */
trait CloneCollectionTrait
{
    /**
     * Clones the map and all objects within.
     *
     * @api
     */
    public function clone(): self
    {
        return self::of($this->collection->clone());
    }
}
