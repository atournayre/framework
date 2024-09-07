<?php

declare(strict_types=1);

namespace Atournayre\Tests\Primitives\Collection;

use Atournayre\Tests\Fixtures\Collection\PriceCollection;
use Atournayre\Tests\Fixtures\Price;
use PHPUnit\Framework\TestCase;

final class NumericCollectionTest extends TestCase
{
    public function testAdd(): void
    {
        $collection = PriceCollection::asList([Price::fromInt(1, 2)], 2);
        $newCollection = $collection->add(Price::fromInt(2, 2));
        self::assertTrue($newCollection->count()->equalsTo(2)->isTrue());
    }

    public function testAddWithDifferentPrecision(): void
    {
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage('Precisions must be the same.');
        $collection = PriceCollection::asList([Price::fromInt(1, 2)], 2);
        $collection->add(Price::fromInt(2, 3));
    }

    public function testSumWithEmptyCollection(): void
    {
        $collection = PriceCollection::asList([], 2);
        self::assertSame(0, $collection->sum()->intValue());
    }

    public function testSumWithOneElement(): void
    {
        $collection = PriceCollection::asList([Price::fromInt(1, 2)], 2);
        self::assertSame(100, $collection->sum()->intValue());
        self::assertSame(1.00, $collection->sum()->value());
        self::assertSame(2, $collection->sum()->precision());
    }

    public function testSumWithTwoElements(): void
    {
        $collection = PriceCollection::asList(
            [
                Price::fromInt(1, 2),
                Price::fromInt(2, 2),
            ],
            2
        );
        self::assertSame(300, $collection->sum()->intValue());
        self::assertSame(3.00, $collection->sum()->value());
        self::assertSame(2, $collection->sum()->precision());
    }

    public function testMin(): void
    {
        $collection = PriceCollection::asList(
            [
                Price::fromInt(10, 2),
                Price::fromInt(2, 2),
                Price::fromInt(200, 2),
                Price::fromInt(20, 2),
            ],
            2
        );
        self::assertSame(200, $collection->min()->intValue());
    }

    public function testMax(): void
    {
        $collection = PriceCollection::asList(
            [
                Price::fromInt(10, 2),
                Price::fromInt(2, 2),
                Price::fromInt(200, 2),
                Price::fromInt(20, 2),
            ],
            2
        );

        self::assertSame(20000, $collection->max()->intValue());
    }

    public function testAvgWithEmptyCollection(): void
    {
        $collection = PriceCollection::asList([], 2);
        self::assertSame(0, $collection->avg()->intValue());
    }

    public function testAvgWithOneElement(): void
    {
        $collection = PriceCollection::asList([Price::fromInt(1, 2)], 2);
        self::assertSame(100, $collection->avg()->intValue());
        self::assertSame(1.00, $collection->avg()->value());
        self::assertSame(2, $collection->avg()->precision());
    }

    public function testAvgWithTwoElements(): void
    {
        $collection = PriceCollection::asList(
            [
                Price::fromInt(1, 2),
                Price::fromInt(2, 2),
            ],
            2
        );

        self::assertSame(150, $collection->avg()->intValue());
        self::assertSame(1.50, $collection->avg()->value());
        self::assertSame(2, $collection->avg()->precision());
    }

    public function testValidateListCollection(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Negative price is not allowed.');
        PriceCollection::asList([
            Price::fromInt(1, 2),
            Price::fromInt(-2, 2),
        ], 2);
    }

    public function testValidateMapCollection(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Negative price is not allowed.');
        PriceCollection::asMap([
            'key1' => Price::fromInt(1, 2),
            'key2' => Price::fromInt(-2, 2),
        ], 2);
    }
}
