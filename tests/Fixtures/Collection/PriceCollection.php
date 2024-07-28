<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures\Collection;

use Atournayre\Contracts\Collection\NumericListInterface;
use Atournayre\Contracts\Collection\NumericMapInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\NumericCollectionTrait;

final class PriceCollection implements NumericListInterface, NumericMapInterface
{
    use NumericCollectionTrait;

    /**
     * @api
     */
    public function rekey(callable $callback): self
    {
        $collection = $this->collection
            ->rekey($callback)
            ->toArray()
        ;

        return new self(Collection::of($collection), $this->precision);
    }
}
