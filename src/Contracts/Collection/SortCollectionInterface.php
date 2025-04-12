<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface SortCollectionInterface.
 */
interface SortCollectionInterface
{
    /**
     * Sorts the elements assigning new keys.
     *
     * @api
     */
    public function sort(int $options = SORT_REGULAR): self;
}
