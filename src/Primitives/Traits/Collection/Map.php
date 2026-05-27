<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\MapInterface;

/**
 * Trait Map.
 *
 * @see MapInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Map
{
    /**
     * Applies a callback to each element and returns the results.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function map(callable $callback): self
    {
        $map = $this->collection->map($callback);

        return self::of($map);
    }
}
