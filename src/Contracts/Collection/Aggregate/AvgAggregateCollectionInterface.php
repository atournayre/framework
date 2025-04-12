<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection\Aggregate;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;

interface AvgAggregateCollectionInterface
{
    /**
     * @throws ThrowableInterface
     */
    public function avg(?string $key = null): Numeric;
}
