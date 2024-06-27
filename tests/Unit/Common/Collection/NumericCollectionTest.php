<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\Collection;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\NumericCollection;
use Atournayre\Primitives\Numeric;
use PHPUnit\Framework\TestCase;

final class NumericCollectionTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testOnlyAcceptsNumericObjects(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('All elements must be of type '.Numeric::class.'.');

        NumericCollection::asList([
            Numeric::of(123, 2),
            'not a Numeric object',
        ], 2);
    }

    /**
     * @throws \Exception
     */
    public function testThrowErrorWhenNotNumericObjectAdded(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('All elements must be of type '.Numeric::class.'.');

        $dateTimeCollection = NumericCollection::asList([
            Numeric::of(123, 2),
        ], 2);

        $dateTimeCollection[] = 'not a Numeric object';
    }

    /**
     * @throws \Exception
     */
    public function testAddElementConditionally(): void
    {
        $dateTimeCollection = NumericCollection::asList([
            Numeric::of(123, 2),
        ], 2)
            ->add(Numeric::of(123, 2), true)
            ->add(Numeric::of(123, 2), BoolEnum::fromBool(true))
            ->add(Numeric::of(123, 2), fn () => true)
            ->add(Numeric::of(123, 2), fn (Numeric $numeric) => $numeric->greaterThan(Numeric::of(100)))
            ->add(Numeric::of(123, 2), fn (Numeric $numeric) => $numeric->greaterThan(100))
        ;

        self::assertCount(6, $dateTimeCollection);
    }

    /**
     * @throws \Exception
     */
    public function testSetElementConditionally(): void
    {
        $dateTimeCollection = NumericCollection::asList([
            Numeric::of(123, 2),
        ], 2)
            ->set(1, Numeric::of(123, 2), true)
            ->set(2, Numeric::of(123, 2), BoolEnum::fromBool(true))
            ->set(3, Numeric::of(123, 2), fn () => true)
            ->set(4, Numeric::of(123, 2), fn (Numeric $numeric) => $numeric->greaterThan(Numeric::of(100)))
            ->set(5, Numeric::of(123, 2), fn (Numeric $numeric) => $numeric->greaterThan(100))
        ;

        self::assertCount(6, $dateTimeCollection);
    }

    public function testNumericCollectionWithDifferentPrecision(): void
    {
        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage('All elements must have the same precision as the collection.');

        NumericCollection::asList(
            [
                Numeric::of(1, 2),
                Numeric::of(2, 3),
            ], 2);
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

    public function testMinOfNumericCollection(): void
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

    public function testMaxOfNumericCollection(): void
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
