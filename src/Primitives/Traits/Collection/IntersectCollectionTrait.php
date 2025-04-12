<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IntersectCollectionInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait IntersectCollectionTrait.
 *
 * @see IntersectCollectionInterface
 */
trait IntersectCollectionTrait
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
        $elements = $this->convertElementsToArray($elements);
        $intersect = $this->collection->intersect($elements, $callback);

        return self::of($intersect);
    }
}
