<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ConcatCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait ConcatCollectionTrait.
 *
 * @see ConcatCollectionInterface
 */
trait ConcatCollectionTrait
{
    /**
     * Adds all elements with new keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function concat($elements): self
    {
        $this->ensureMutable('concat');
        $elements = $this->convertElementsToArray($elements);
        $concat = $this->collection->concat($elements);

        return self::of($concat);
    }
}
