<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface OffsetGetInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface OffsetGetInterface
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
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function offsetGet($offset);
}
