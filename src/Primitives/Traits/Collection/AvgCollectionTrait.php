<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;
use Atournayre\Contracts\Collection\AvgCollectionInterface;

/**
 * Trait AvgCollectionTrait
 *
 * @see AvgCollectionInterface
 */
trait AvgCollectionTrait
{
    /**
 * Returns the average of all values.
 *
 * @throws ThrowableInterface
 *
 * @api
 */
public function avg(?string $key = null) : Numeric
{
    $avg = $this->collection->avg($key);
    return Numeric::fromFloat($avg);
}
}
