<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Primitives\Numeric;

/**
 * @template T
 *
 * @extends AbstractCollection<T>
 */
class NumericCollection extends AbstractCollection
{
    protected const DEFAULT_PRECISION = 0;

    protected static string $type = Numeric::class;

    /** @api */
    public int $precision;

    protected array $collection = [];

    protected function __construct(
        array $collection = [],
        int $precision = self::DEFAULT_PRECISION
    ) {
        Assert::allIsInstanceOf($collection, Numeric::class);

        parent::__construct($collection);
        $this->precision = $precision;
    }

    /**
     * @api
     *
     * @param array<int, T> $collection
     *
     * @return self<T>
     */
    public static function asList(array $collection, int $precision = self::DEFAULT_PRECISION): self
    {
        Assert::isListOf($collection, NumericCollection::$type);
        self::assertSamePrecision($collection, $precision);

        return new self($collection, $precision);
    }

    /**
     * @api
     *
     * @param array<string, T> $collection
     *
     * @return self<T>
     */
    public static function asMap(array $collection, int $precision = self::DEFAULT_PRECISION): self
    {
        Assert::isMapOf($collection, NumericCollection::$type);
        self::assertSamePrecision($collection, $precision);

        return new self($collection, $precision);
    }

    /**
     * @param array<int|string, T> $collection
     */
    private static function assertSamePrecision(array $collection, int $precision): void
    {
        if ([] === $collection) {
            return;
        }

        $avgPrecision = array_sum(array_map(static fn (Numeric $value) => $value->precision(), $collection)) / count($collection);
        Assert::true($avgPrecision === $precision, 'All elements must have the same precision as the collection.');
    }

    public function offsetSet($offset, $value): void
    {
        $this->offsetSetAssertion($offset, $value);
        $this->collection[$offset] = Numeric::of($value, $this->precision);
    }

    /**
     * @api
     *
     * @param T $value
     *
     * @return self<T>
     */
    public function add($value): self
    {
        Assert::isInstanceOf($value, self::$type, 'Value must be an instance of '.self::$type);
        Assert::eq($value->precision(), $this->precision, 'Value must have the same precision as the collection');

        $values = $this->collection;
        $values[] = $value;

        return new self($values, $this->precision);
    }

    /**
     * @return Numeric[]
     */
    public function values(): array
    {
        return $this->collection;
    }

    /**
     * @api
     */
    public function sum(): Numeric
    {
        if ($this->hasNoElement()) {
            return Numeric::of(0, $this->precision);
        }

        $sum = $this->toMap()
            ->map(static fn (Numeric $value) => $value->intValue())
            ->sum()
        ;

        return Numeric::of($sum / (10 ** $this->precision), $this->precision);
    }

    /**
     * @api
     */
    public function avg(): Numeric
    {
        if ($this->hasNoElement()) {
            return Numeric::of(0, $this->precision);
        }

        $avg = $this->toMap()
            ->map(static fn (Numeric $value) => $value->intValue())
            ->avg()
        ;

        return Numeric::fromInt((int) $avg, $this->precision);
    }

    /**
     * @api
     */
    public function min(): Numeric
    {
        if ($this->hasNoElement()) {
            return Numeric::of(0, $this->precision);
        }

        $min = $this->toMap()
            ->map(static fn (Numeric $value) => $value->intValue())
            ->min()
        ;

        return Numeric::fromInt((int) $min, $this->precision);
    }

    /**
     * @api
     */
    public function max(): Numeric
    {
        if ($this->hasNoElement()) {
            return Numeric::of(0, $this->precision);
        }

        $max = $this->toMap()
            ->map(static fn (Numeric $value) => $value->intValue())
            ->max()
        ;

        return Numeric::fromInt((int) $max, $this->precision);
    }
}
