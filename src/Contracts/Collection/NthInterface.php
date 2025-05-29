<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface NthInterface.
 */
interface NthInterface
{
    /**
     * Returns every nth element from the map.
     *
     * @api
     */
    public function nth(int $step, int $offset = 0): self;
}
