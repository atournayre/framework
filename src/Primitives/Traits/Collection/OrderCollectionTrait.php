<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\OrderCollectionInterface;

/**
 * Trait OrderCollectionTrait.
 *
 * @see OrderCollectionInterface
 */
trait OrderCollectionTrait
{
    /**
     * Orders elements by the passed keys.
     *
     * @param iterable<mixed> $keys Keys of the elements in the required order
     *
     * @api
     */
    public function order(iterable $keys): self
    {
        $order = $this->collection->order($keys);

        return self::of($order);
    }
}
