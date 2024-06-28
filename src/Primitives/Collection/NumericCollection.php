<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Aimeos\Map;
use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\Numeric;

class NumericCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;
    private const DEFAULT_PRECISION = 0;

    private int $precision;

    public static function elementType(): string
    {
        return Numeric::class;
    }

    /**
     * @param int $precision
     * @return self
     */
    public static function asList($elements = [], int $precision = self::DEFAULT_PRECISION): self
    {
        $collection = (new self(
            $elements,
            self::$COLLECTION_TYPE_LIST,
            self::elementType()
        ))
            ->withPrecision($precision)
        ;

        self::assertSamePrecision($elements, $precision);

        return $collection;
    }

    /**
     * @param int $precision
     * @return self
     */
    public static function asMap($elements = [], int $precision = self::DEFAULT_PRECISION): self
    {
        $collection = (new self(
            $elements,
            self::$COLLECTION_TYPE_MAP,
            self::elementType()
        ))
            ->withPrecision($precision)
        ;

        self::assertSamePrecision($elements, $precision);

        return $collection;
    }

    private function withPrecision(int $precision): self
    {
        $clone = clone $this;
        $clone->precision = $precision;

        return $clone;
    }

    private static function assertSamePrecision(array $collection, int $precision): void
    {
        if ([] === $collection) {
            return;
        }

        Assert::allSame(
            Map::from($collection)
                ->map(static fn (Numeric $value) => $value->precision())
                ->toArray(),
            $precision,
            'All elements must have the same precision as the collection.'
        );
    }

    /**
     * @api
     */
    public function sum(): Numeric
    {
        if ($this->hasNoElement()->isTrue()) {
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
    public function min(): Numeric
    {
        if ($this->hasNoElement()->isTrue()) {
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
        if ($this->hasNoElement()->isTrue()) {
            return Numeric::of(0, $this->precision);
        }

        $max = $this->toMap()
            ->map(static fn (Numeric $value) => $value->intValue())
            ->max()
        ;

        return Numeric::fromInt((int) $max, $this->precision);
    }

    /**
     * @api
     */
    public function avg(): Numeric
    {
        if ($this->hasNoElement()->isTrue()) {
            return Numeric::of(0, $this->precision);
        }

        $avg = $this->toMap()
            ->map(static fn (Numeric $value) => $value->intValue())
            ->avg()
        ;

        return Numeric::fromInt((int) $avg, $this->precision);
    }

    /**
     * @return array<int|string, array>

     */
    public function toLog(): array
    {
        return $this->toMap()
            ->map(static fn (Numeric $value): array => $value->toLog())
            ->toArray()
        ;
    }
}
