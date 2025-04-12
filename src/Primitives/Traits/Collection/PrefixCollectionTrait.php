<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\PrefixCollectionInterface;

/**
 * Trait PrefixCollectionTrait.
 *
 * @see PrefixCollectionInterface
 */
trait PrefixCollectionTrait
{
    /**
     * Adds a prefix to each map entry.
     *
     * @param \Closure|string $prefix Prefix string or anonymous function with ($item, $key) as parameters
     * @param int|null        $depth  Maximum depth to dive into multi-dimensional arrays starting from "1"
     *
     * @api
     */
    public function prefix($prefix, ?int $depth = null): self
    {
        $prefix = $this->collection->prefix($prefix, $depth);

        return self::of($prefix);
    }
}
