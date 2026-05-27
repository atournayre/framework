<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface SliceInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface SliceInterface
{
    /**
     * Returns a slice of the map.
     *
     * @param int      $offset Number of elements to start from
     * @param int|null $length Number of elements to return or NULL for no limit
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function slice(int $offset, ?int $length = null): self;
}
