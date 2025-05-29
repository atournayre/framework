<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface SortInterface.
 */
interface SortInterface
{
    /**
     * Sorts the elements assigning new keys.
     *
     * @api
     */
    public function sort(int $options = SORT_REGULAR): self;
}
