<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface OrderCollectionInterface.
 */
interface OrderCollectionInterface
{
    /**
     * Orders elements by the passed keys.
     *
     * @param iterable<mixed> $keys Keys of the elements in the required order
     *
     * @api
     */
    public function order(iterable $keys): self;
}
