<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\DiffKeysInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait DiffKeys.
 *
 * @see DiffKeysInterface
 */
trait DiffKeys
{
    /**
     * Returns the elements missing in the given list by keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param callable|null                         $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     *
     * @api
     */
    public function diffKeys($elements, ?callable $callback = null): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $diffKeys = $this->collection->diffKeys($elements, $callback);

        return self::of($diffKeys);
    }
}
