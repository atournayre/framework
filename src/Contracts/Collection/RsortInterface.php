<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface RsortInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface RsortInterface
{
    /**
     * Reverse sort elements using new keys.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function rsort(int $options = SORT_REGULAR): self;
}
