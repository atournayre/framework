<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface TakeInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface TakeInterface
{
    /**
     * Returns a new map with the given number of items.
     *
     * @param int                                 $size   Number of items to return
     * @param \Closure|int|array<array-key,mixed> $offset Number of items to skip or function($item, $key) returning true for skipped items
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function take(int $size, $offset = 0): self;
}
