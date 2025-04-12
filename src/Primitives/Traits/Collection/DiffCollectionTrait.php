<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\DiffCollectionInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait DiffCollectionTrait.
 *
 * @see DiffCollectionInterface
 */
trait DiffCollectionTrait
{
    /**
     * Returns the elements missing in the given list.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param callable|null                         $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function diff($elements, ?callable $callback = null): self
    {
        $elements = $this->convertElementsToArray($elements);
        $diff = $this->collection->diff($elements, $callback);

        return self::of($diff);
    }
}
