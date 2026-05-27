<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface KrsortInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface KrsortInterface
{
    /**
     * Reverse sort elements by keys.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function krsort(int $options = SORT_REGULAR): self;
}
