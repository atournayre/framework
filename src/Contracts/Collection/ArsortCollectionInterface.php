<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ArsortCollectionInterface.
 */
interface ArsortCollectionInterface
{
    /**
     * Reverse sort elements preserving keys.
     *
     * @api
     */
    public function arsort(int $options = SORT_REGULAR): self;
}
