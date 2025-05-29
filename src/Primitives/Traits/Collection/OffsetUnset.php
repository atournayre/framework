<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\OffsetUnsetInterface;

/**
 * Trait OffsetUnset.
 *
 * @see OffsetUnsetInterface
 */
trait OffsetUnset
{
    /**
     * Removes an element by key.
     *
     * @api
     *
     * @param array-key $key
     */
    public function offsetUnset($key): void
    {
        $this->collection->offsetUnset($key);
    }
}
