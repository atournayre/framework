<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UniqueInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface UniqueInterface
{
    /**
     * Returns all unique elements preserving keys.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function unique(?string $key = null): self;
}
