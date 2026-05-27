<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CloneInterface;

/**
 * Trait Clone.
 *
 * @see CloneInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Clone_
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
