<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\UnionCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait UnionCollectionTrait.
 *
 * @see UnionCollectionInterface
 */
trait UnionCollectionTrait
{
    /**
     * Adds the elements without overwriting existing ones.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function union($elements): self
    {
        $this->ensureMutable('union');
        $elements = $this->convertElementsToArray($elements);
        $union = $this->collection->union($elements);

        return self::of($union);
    }
}
