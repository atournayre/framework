<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface MergeCollectionInterface.
 */
interface MergeCollectionInterface
{
    /**
     * Combines elements overwriting existing ones.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function merge($elements, bool $recursive = false): self;
}
