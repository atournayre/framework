<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\TakeInterface;

/**
 * Trait Take.
 *
 * @see TakeInterface
 */
trait Take
{
    /**
     * Returns a new map with the given number of items.
     *
     * @param int                                 $size   Number of items to return
     * @param \Closure|int|array<array-key,mixed> $offset Number of items to skip or function($item, $key) returning true for skipped items
     *
     * @api
     */
    public function take(int $size, $offset = 0): self
    {
        $take = $this->collection->take($size, $offset);

        return self::of($take);
    }
}
