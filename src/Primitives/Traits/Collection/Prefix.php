<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\PrefixInterface;

/**
 * Trait Prefix.
 *
 * @see PrefixInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Prefix
{
    /**
     * Adds a prefix to each map entry.
     *
     * @param \Closure|string $prefix Prefix string or anonymous function with ($item, $key) as parameters
     * @param int|null        $depth  Maximum depth to dive into multi-dimensional arrays starting from "1"
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function prefix($prefix, ?int $depth = null): self
    {
        $prefix = $this->collection->prefix($prefix, $depth);

        return self::of($prefix);
    }
}
