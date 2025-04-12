<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IntersectAssocCollectionInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait IntersectAssocCollectionTrait.
 *
 * @see IntersectAssocCollectionInterface
 */
trait IntersectAssocCollectionTrait
{
    /**
     * Returns the elements shared and checks keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function intersectAssoc($elements, ?callable $callback = null): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $intersectAssoc = $this->collection->intersectAssoc($elements, $callback);

        return self::of($intersectAssoc);
    }
}
