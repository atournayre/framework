<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface OnlyCollectionInterface.
 */
interface OnlyCollectionInterface
{
    /**
     * Returns only those elements specified by the keys.
     *
     * @param iterable<mixed>|array<mixed>|string|int $keys Keys of the elements that should be returned
     *
     * @api
     */
    public function only($keys): self;
}
