<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;
use Atournayre\Contracts\Collection\SumCollectionInterface;

/**
 * Trait SumCollectionTrait
 *
 * @see SumCollectionInterface
 */
trait SumCollectionTrait
{
    /**
 * Returns the sum of all values in the map.
 *
 * @throws ThrowableInterface
 *
 * @api
 */
public function sum(?string $key = null) : Numeric
{
    $sum = $this->collection->sum($key);
    return Numeric::fromFloat($sum);
}
}
