<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ArsortInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface ArsortInterface
{
    /**
     * Reverse sort elements preserving keys.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function arsort(int $options = SORT_REGULAR): self;
}
