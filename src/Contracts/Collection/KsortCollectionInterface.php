<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface KsortCollectionInterface.
 */
interface KsortCollectionInterface
{
    /**
     * Sort elements by keys.
     *
     * @api
     */
    public function ksort(int $options = SORT_REGULAR): self;
}
