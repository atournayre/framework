<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\EachInterface;

/**
 * Trait Each.
 *
 * @see EachInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Each
{
    /**
     * Applies a callback to each element.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function each(\Closure $callback): self
    {
        $collection = $this->collection->each($callback);

        return self::of($collection);
    }
}
