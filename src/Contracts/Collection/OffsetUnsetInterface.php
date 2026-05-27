<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface OffsetUnsetInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface OffsetUnsetInterface
{
    /**
     * Removes an element by key.
     *
     * @api
     *
     * @param array-key $key
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function offsetUnset($key): void;
}
