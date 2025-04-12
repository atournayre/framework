<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface GroupByCollectionInterface.
 */
interface GroupByCollectionInterface
{
    /**
     * Groups associative array elements or objects.
     *
     * @param \Closure|string|int $key Closure function with (item, idx) parameters returning the key or the key itself to group by
     *
     * @api
     */
    public function groupBy($key): self;
}
