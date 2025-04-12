<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface SliceCollectionInterface.
 */
interface SliceCollectionInterface
{
    /**
     * Returns a slice of the map.
     *
     * @param int      $offset Number of elements to start from
     * @param int|null $length Number of elements to return or NULL for no limit
     *
     * @api
     */
    public function slice(int $offset, ?int $length = null): self;
}
