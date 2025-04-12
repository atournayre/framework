<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ConcatCollectionInterface.
 */
interface ConcatCollectionInterface
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
    public function concat($elements): self;
}
