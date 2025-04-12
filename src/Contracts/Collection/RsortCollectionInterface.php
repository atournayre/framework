<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface RsortCollectionInterface.
 */
interface RsortCollectionInterface
{
    /**
     * Reverse sort elements using new keys.
     *
     * @api
     */
    public function rsort(int $options = SORT_REGULAR): self;
}
