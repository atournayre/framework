<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface RandomInterface.
 */
interface RandomInterface
{
    /**
     * Returns random elements preserving keys.
     *
     * @param int $max Maximum number of elements that should be returned
     *
     * @api
     */
    public function random(int $max = 1): self;
}
