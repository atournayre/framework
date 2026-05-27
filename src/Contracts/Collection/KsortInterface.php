<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface KsortInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface KsortInterface
{
    /**
     * Sort elements by keys.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function ksort(int $options = SORT_REGULAR): self;
}
