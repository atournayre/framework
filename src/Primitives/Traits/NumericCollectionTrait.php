<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Numeric;
use Atournayre\Primitives\Traits\Collection\CollectionAsListTrait;
use Atournayre\Primitives\Traits\Collection\CollectionAsMapTrait;

trait NumericCollectionTrait
{
    use CollectionCommonTrait;
    use CollectionAsMapTrait;
    use CollectionAsListTrait;

    protected Collection $collection;

    private int $precision;

    private function __construct(Collection $collection, int $precision)
    {
        $this->collection = $collection;
        $this->precision = $precision;
    }

    /**
     * @param mixed $numeric the numeric value to add
     */
    public function add($numeric): self
    {
        Assert::same($numeric->precision(), $this->precision, 'Precisions must be the same.');

        $clone = clone $this;
        $values = $clone
            ->collection
            ->push($numeric)
            ->toArray()
        ;

        return self::asList($values, $this->precision);
    }

    public function sum(): Numeric
    {
        if ($this->hasNoElement()->isTrue()) {
            return Numeric::of(0, $this->precision);
        }

        if ($this->hasOneElement()->isTrue()) {
            return Numeric::of($this->first()->value(), $this->precision);
        }

        $sum = $this->collection
            ->map(static fn ($value) => $value->intValue())
            ->sum()
        ;

        $sumValue = $sum->value() / (10 ** $this->precision);

        return Numeric::of($sumValue, $this->precision);
    }

    /**
     * @throws \Throwable
     * @throws ThrowableInterface
     */
    public function avg(): Numeric
    {
        if ($this->hasNoElement()->isTrue()) {
            return Numeric::of(0, $this->precision);
        }

        if ($this->hasOneElement()->isTrue()) {
            return Numeric::of($this->first()->value(), $this->precision);
        }

        $this->_validateCollection();

        $avg = $this->collection
            ->map(static fn ($value) => $value->intValue())
            ->avg()
        ;

        $avgValue = $avg->value() / (10 ** $this->precision);

        return Numeric::of($avgValue, $this->precision);
    }

    /**
     * @throws \Throwable
     * @throws ThrowableInterface
     */
    public function max(): Numeric
    {
        if ($this->hasNoElement()->isTrue()) {
            return Numeric::of(0, $this->precision);
        }

        if ($this->hasOneElement()->isTrue()) {
            return Numeric::of($this->first()->value(), $this->precision);
        }

        $this->_validateCollection();

        $max = $this->collection
            ->map(static fn ($value) => $value->intValue())
            ->max()
        ;

        $maxValue = $max->value() / (10 ** $this->precision);

        return Numeric::of($maxValue, $this->precision);
    }

    /**
     * @throws \Throwable
     * @throws ThrowableInterface
     */
    public function min(): Numeric
    {
        if ($this->hasNoElement()->isTrue()) {
            return Numeric::of(0, $this->precision);
        }

        if ($this->hasOneElement()->isTrue()) {
            return Numeric::of($this->first()->value(), $this->precision);
        }

        $this->_validateCollection();

        $min = $this->collection
            ->map(static fn ($value) => $value->intValue())
            ->min()
        ;

        $minValue = $min->value() / (10 ** $this->precision);

        return Numeric::of($minValue, $this->precision);
    }

    private function _validateCollection(): void
    {
        $every = $this->collection
            ->every(static fn ($element) => method_exists($element, 'value'))
        ;

        Assert::true($every->isTrue(), 'All elements must be Numeric.');
    }
}
