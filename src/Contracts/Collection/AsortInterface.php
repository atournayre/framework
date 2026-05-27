<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface AsortInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface AsortInterface
{
    /**
     * Sort elements preserving keys.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function asort(int $options = SORT_REGULAR): self;
}
