<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface KrsortInterface.
 */
interface KrsortInterface
{
    /**
     * Reverse sort elements by keys.
     *
     * @api
     */
    public function krsort(int $options = SORT_REGULAR): self;
}
