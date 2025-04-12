<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\GroupByCollectionInterface;

/**
 * Trait GroupByCollectionTrait.
 *
 * @see GroupByCollectionInterface
 */
trait GroupByCollectionTrait
{
    /**
     * Groups associative array elements or objects.
     *
     * @param \Closure|string|int $key Closure function with (item, idx) parameters returning the key or the key itself to group by
     *
     * @api
     */
    public function groupBy($key): self
    {
        $groupBy = $this->collection->groupBy($key);

        return self::of($groupBy);
    }
}
