<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection\Aggregate;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;

interface MaxAggregateCollectionInterface
{
    /**
     * @throws ThrowableInterface
     */
    public function max(?string $key = null): Numeric;
}
