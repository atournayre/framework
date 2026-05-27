<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface DuplicatesInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface DuplicatesInterface
{
    /**
     * Returns the duplicate values from the map.
     *
     * For nested arrays, you have to pass the name of the column of the nested
     * array which should be used to check for duplicates.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function duplicates(?string $key = null): self;
}
