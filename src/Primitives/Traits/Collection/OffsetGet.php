<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\OffsetGetInterface;

/**
 * Trait OffsetGet.
 *
 * @see OffsetGetInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait OffsetGet
{
    /**
     * Returns an element by key.
     *
     * @param array-key $offset
     *
     * @return mixed|null
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function offsetGet($offset)
    {
        return $this->collection->offsetGet($offset);
    }
}
