<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures\Collection;

use Atournayre\Contracts\Collection\NumericListInterface;
use Atournayre\Contracts\Collection\NumericMapInterface;
use Atournayre\Primitives\Traits\NumericCollectionTrait;

final class PriceCollection implements NumericListInterface, NumericMapInterface
{
    use NumericCollectionTrait;
}
