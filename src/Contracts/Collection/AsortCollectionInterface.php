<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface AsortCollectionInterface.
 */
interface AsortCollectionInterface
{
    /**
     * Sort elements preserving keys.
     *
     * @api
     */
    public function asort(int $options = SORT_REGULAR): self;
}
