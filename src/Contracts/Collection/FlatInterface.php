<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface FlatInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface FlatInterface
{
    /**
     * Flattens multi-dimensional elements without overwriting elements.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function flat(?int $depth = null): self;
}
