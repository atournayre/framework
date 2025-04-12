<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection\Aggregate;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;

interface SumAggregateCollectionInterface
{
    /**
     * @throws ThrowableInterface
     */
    public function sum(?string $key = null): Numeric;
}
