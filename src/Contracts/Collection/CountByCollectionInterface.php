<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CountByCollectionInterface.
 */
interface CountByCollectionInterface
{
    /**
     * Counts how often the same values are in the map.
     *
     * @param callable|null $callback Function with (value, key) parameters which returns the value to use for counting
     *
     * @api
     */
    public function countBy(?callable $callback = null): self;
}
