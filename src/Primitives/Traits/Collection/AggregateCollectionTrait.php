<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait AggregateCollectionTrait.
 */
trait AggregateCollectionTrait
{
    use AvgCollectionTrait;
    use MaxCollectionTrait;
    use MinCollectionTrait;
    use SumCollectionTrait;
}
