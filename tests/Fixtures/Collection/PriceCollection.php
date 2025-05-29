<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Collection\CollectionValidationInterface;
use Atournayre\Contracts\Collection\NumericListInterface;
use Atournayre\Contracts\Collection\NumericMapInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\NumericCollectionTrait;
use Atournayre\Tests\Fixtures\Price;

final class PriceCollection implements NumericListInterface, NumericMapInterface, CollectionValidationInterface
{
    use NumericCollectionTrait;

    /**
     * @throws ThrowableInterface
     */
    public function validateCollection(): void
    {
        $every = $this->collection
            ->every(static fn ($element) => method_exists($element, 'value'))
        ;

        Assert::true($every->isTrue(), 'All elements must be Numeric.');

        $this
            ->collection
            ->filter(fn (Price $price) => $price->lessThan(0)->yes())
            ->atLeastOneElement()
            ->throwIfTrue('Negative price is not allowed.')
        ;
    }

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

    /**
     * @throws ThrowableInterface
     */
    public static function asList(array $collection, int $precision): self
    {
        $priceCollection = new self(Collection::of($collection), $precision);

        $priceCollection->validateCollection();

        return $priceCollection;
    }

    /**
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection, int $precision): self
    {
        $priceCollection = new self(Collection::of($collection), $precision);

        $priceCollection->validateCollection();

        return $priceCollection;
    }
}
