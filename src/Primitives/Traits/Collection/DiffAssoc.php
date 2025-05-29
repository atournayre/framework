<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\DiffAssocInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait DiffAssoc.
 *
 * @see DiffAssocInterface
 */
trait DiffAssoc
{
    /**
     * Returns the elements missing in the given list and checks keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param callable|null                         $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function diffAssoc($elements, ?callable $callback = null): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $diffAssoc = $this->collection->diffAssoc($elements, $callback);

        return self::of($diffAssoc);
    }
}
