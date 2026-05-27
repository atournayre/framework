<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface GroupByInterface.
 */
interface GroupByInterface
{
    /**
     * Groups associative array elements or objects.
     *
     * @param \Closure|string|int $key Closure function with (item, idx) parameters returning the key or the key itself to group by
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function groupBy($key): self;
}
