<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection\Aggregate;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;

trait SumAggregateCollectionTrait
{
    /**
     * Returns the sum of all values in the map.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function sum(?string $key = null): Numeric
    {
        $sum = $this->collection->sum($key);

        return Numeric::fromFloat($sum);
    }
}
