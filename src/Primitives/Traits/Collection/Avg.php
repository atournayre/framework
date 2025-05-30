<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\AvgInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;

/**
 * Trait Avg.
 *
 * @see AvgInterface
 */
trait Avg
{
    /**
     * Returns the average of all values.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function avg(?string $key = null): Numeric
    {
        $avg = $this->collection->avg($key);

        return Numeric::fromFloat($avg);
    }
}
