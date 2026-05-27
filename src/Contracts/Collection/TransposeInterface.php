<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface TransposeInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface TransposeInterface
{
    /**
     * Exchanges rows and columns for a two dimensional map.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function transpose(): self;
}
