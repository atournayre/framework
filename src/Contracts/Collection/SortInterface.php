<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface SortInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface SortInterface
{
    /**
     * Sorts the elements assigning new keys.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function sort(int $options = SORT_REGULAR): self;
}
