<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Primitives\Int_;
use Atournayre\Primitives\Numeric;

trait AggregateCollectionTrait
{
    /**
     * Returns the average of all values.
     *
     * @api
     */
    public function avg(?string $key = null): Numeric
    {
        $avg = $this->collection->avg($key);

        return Numeric::fromFloat($avg);
    }

    /**
     * Returns the maximum value of all elements.
     *
     * @api
     */
    public function max(?string $key = null): Numeric
    {
        if ($this->isEmpty()->isTrue()) {
            return Numeric::of(0);
        }

        $max = $this->collection
            ->max($key)
        ;

        return Numeric::fromFloat($max);
    }

    /**
     * Returns the minium value of all elements.
     *
     * @api
     */
    public function min(?string $key = null): Numeric
    {
        if ($this->isEmpty()->isTrue()) {
            return Numeric::of(0);
        }

        $min = $this->collection
            ->min($key)
        ;

        return Numeric::fromFloat($min);
    }

    /**
     * Returns the sum of all values in the map.
     *
     * @api
     */
    public function sum(?string $key = null): Numeric
    {
        $sum = $this->collection->sum($key);

        return Numeric::fromFloat($sum);
    }
}
