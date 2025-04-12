<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface DuplicatesCollectionInterface.
 */
interface DuplicatesCollectionInterface
{
    /**
     * Returns the duplicate values from the map.
     *
     * For nested arrays, you have to pass the name of the column of the nested
     * array which should be used to check for duplicates.
     *
     * @api
     */
    public function duplicates(?string $key = null): self;
}
