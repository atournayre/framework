<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\AtInterface;

/**
 * Trait At.
 *
 * @see AtInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait At
{
    /**
     * Returns the value at the given position.
     *
     * @return mixed|null
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function at(int $pos)
    {
        return $this->collection->at($pos);
    }
}
