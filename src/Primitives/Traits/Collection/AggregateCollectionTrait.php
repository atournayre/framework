<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Primitives\Traits\Collection\Aggregate\AvgAggregateCollectionTrait;
use Atournayre\Primitives\Traits\Collection\Aggregate\MaxAggregateCollectionTrait;
use Atournayre\Primitives\Traits\Collection\Aggregate\MinAggregateCollectionTrait;
use Atournayre\Primitives\Traits\Collection\Aggregate\SumAggregateCollectionTrait;

trait AggregateCollectionTrait
{
    use AvgAggregateCollectionTrait;
    use MaxAggregateCollectionTrait;
    use MinAggregateCollectionTrait;
    use SumAggregateCollectionTrait;
}
