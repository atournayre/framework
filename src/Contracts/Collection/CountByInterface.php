<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CountByInterface.
 */
interface CountByInterface
{
    /**
     * Counts how often the same values are in the map.
     *
     * @param callable|null $callback Function with (value, key) parameters which returns the value to use for counting
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function countBy(?callable $callback = null): self;
}
