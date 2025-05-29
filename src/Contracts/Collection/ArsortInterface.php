<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ArsortInterface.
 */
interface ArsortInterface
{
    /**
     * Reverse sort elements preserving keys.
     *
     * @api
     */
    public function arsort(int $options = SORT_REGULAR): self;
}
