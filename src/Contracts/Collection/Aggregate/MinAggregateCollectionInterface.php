<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection\Aggregate;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;

interface MinAggregateCollectionInterface
{
    /**
     * @throws ThrowableInterface
     */
    public function min(?string $key = null): Numeric;
}
