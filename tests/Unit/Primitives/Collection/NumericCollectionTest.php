<?php

declare(strict_types=1);

namespace Atournayre\Tests\Primitives\Collection;

use Atournayre\Primitives\Collection\NumericCollection;
use Atournayre\Primitives\Numeric;
use PHPUnit\Framework\TestCase;

final class NumericCollectionTest extends TestCase
{
    public function testAdd(): void
    {
        $collection = NumericCollection::asList([Numeric::of(1, 2)], 2);
        $newCollection = $collection->add(Numeric::of(2, 2));
        self::assertCount(2, $newCollection->values());
    }

    public function testAddWithDifferentPrecision(): void
    {
        self::expectException(\InvalidArgumentException::class);
        $collection = NumericCollection::asList([Numeric::of(1, 2)], 2);
        $collection->add(Numeric::of(2, 3));
    }

    public function testSumWithDifferentPrecision(): void
    {
        self::expectException(\InvalidArgumentException::class);
        $collection = NumericCollection::asList(
            [
                Numeric::of(1, 2),
                Numeric::of(2, 3),
            ],
            2
        );
        $collection->sum();
    }

    public function testSumWithEmptyCollection(): void
    {
        $collection = NumericCollection::asList([], 2);
        self::assertSame(0, $collection->sum()->intValue());
    }

    public function testSumWithOneElement(): void
    {
        $collection = NumericCollection::asList([Numeric::of(1, 2)], 2);
        self::assertSame(100, $collection->sum()->intValue());
        self::assertSame(1.00, $collection->sum()->value());
        self::assertSame(2, $collection->sum()->precision());
    }

    public function testSumWithTwoElements(): void
    {
        $collection = NumericCollection::asList(
            [
                Numeric::of(1, 2),
                Numeric::of(2, 2),
            ],
            2
        );
        self::assertSame(300, $collection->sum()->intValue());
        self::assertSame(3.00, $collection->sum()->value());
        self::assertSame(2, $collection->sum()->precision());
    }

    public function testMin(): void
    {
        $collection = NumericCollection::asList(
            [
                Numeric::of(10, 2),
                Numeric::of(2, 2),
                Numeric::of(200, 2),
                Numeric::of(20, 2),
            ],
            2
        );
        self::assertSame(200, $collection->min()->intValue());
    }

    public function testMax(): void
    {
        $collection = NumericCollection::asList(
            [
                Numeric::of(10, 2),
                Numeric::of(2, 2),
                Numeric::of(200, 2),
                Numeric::of(20, 2),
            ],
            2
        );

        self::assertSame(20000, $collection->max()->intValue());
    }

    public function testAvgWithEmptyCollection(): void
    {
        $collection = NumericCollection::asList([], 2);
        self::assertSame(0, $collection->avg()->intValue());
    }

    public function testAvgWithOneElement(): void
    {
        $collection = NumericCollection::asList([Numeric::of(1, 2)], 2);
        self::assertSame(100, $collection->avg()->intValue());
        self::assertSame(1.00, $collection->avg()->value());
        self::assertSame(2, $collection->avg()->precision());
    }

    public function testAvgWithTwoElements(): void
    {
        $collection = NumericCollection::asList(
            [
                Numeric::of(1, 2),
                Numeric::of(2, 2),
            ],
            2
        );

        self::assertSame(150, $collection->avg()->intValue());
        self::assertSame(1.50, $collection->avg()->value());
        self::assertSame(2, $collection->avg()->precision());
    }
}
