<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\OffsetGetCollectionInterface;

/**
 * Trait OffsetGetCollectionTrait.
 *
 * @see OffsetGetCollectionInterface
 */
trait OffsetGetCollectionTrait
{
    /**
     * Returns an element by key.
     *
     * @param array-key $offset
     *
     * @return mixed|null
     *
     * @api
     */
    public function offsetGet($offset)
    {
        return $this->collection->offsetGet($offset);
    }
}
