<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Aimeos\Map as AimeosMap;
use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection as Collection_;
use Atournayre\Primitives\Numeric;

trait NumericCollectionTrait
{
    use CollectionCommonTrait;

    private function __construct(
        protected Collection_ $collection,
        protected int $precision,
    )
    {
    }

    /**
     * @param array<int|string, mixed>|AimeosMap|Collection_ $collection
     *
     *@api
     */
    protected static function of(Collection_|AimeosMap|array $collection = [], int $precision = 2): self
    {
        return new self(Collection_::of($collection), $precision);
    }

    /**
     * @param mixed $numeric the numeric value to add
     *
     * @throws ThrowableInterface
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

        return self::of($values, $this->precision);
    }

    /**
     * @throws ThrowableInterface
     */
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

    /**
     * @throws ThrowableInterface
     */
    private function _validateCollection(): void
    {
        $every = $this->collection
            ->every(static fn ($element) => method_exists($element, 'value'))
        ;

        Assert::true($every->isTrue(), 'All elements must be Numeric.');
    }
}
