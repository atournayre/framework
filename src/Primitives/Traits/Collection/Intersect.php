<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IntersectInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait Intersect.
 *
 * @see IntersectInterface
 */
trait Intersect
{
    /**
     * Returns the elements shared.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function intersect($elements, ?callable $callback = null): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $intersect = $this->collection->intersect($elements, $callback);

        return self::of($intersect);
    }
}
