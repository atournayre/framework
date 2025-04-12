<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Primitives\Traits\Collection\AvgCollectionTrait;
use Atournayre\Primitives\Traits\Collection\MaxCollectionTrait;
use Atournayre\Primitives\Traits\Collection\MinCollectionTrait;
use Atournayre\Primitives\Traits\Collection\SumCollectionTrait;

/**
 * Trait AggregateCollectionTrait
 */
trait AggregateCollectionTrait
{
    use AvgCollectionTrait;
    use MaxCollectionTrait;
    use MinCollectionTrait;
    use SumCollectionTrait;
}
