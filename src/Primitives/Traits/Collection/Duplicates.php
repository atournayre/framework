<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\DuplicatesInterface;

/**
 * Trait Duplicates.
 *
 * @see DuplicatesInterface
 */
trait Duplicates
{
    /**
     * Returns the duplicate values from the map.
     *
     * For nested arrays, you have to pass the name of the column of the nested
     * array which should be used to check for duplicates.
     *
     * @api
     */
    public function duplicates(?string $key = null): self
    {
        $duplicates = $this->collection->duplicates($key);

        return self::of($duplicates);
    }
}
