<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UnionCollectionInterface.
 */
interface UnionCollectionInterface
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
    public function union($elements): self;
}
