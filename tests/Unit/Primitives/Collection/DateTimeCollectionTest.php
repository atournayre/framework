<?php

declare(strict_types=1);

namespace Atournayre\Tests\Primitives\Collection;

use Atournayre\Common\VO\DateTime\DateTime;
use Atournayre\Primitives\Collection\DateTimeCollection;
use PHPUnit\Framework\TestCase;

class DateTimeCollectionTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testSortAsc(): void
    {
        $collection = DateTimeCollection::asList([
            DateTime::of('2021-01-05'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-01'),
        ])->sortAsc();

        self::assertCount(5, $collection);
        self::assertEquals(DateTime::of('2021-01-01'), $collection->first());
        self::assertEquals(DateTime::of('2021-01-05'), $collection->last());
    }

    /**
     * @throws \Exception
     */
    public function testSortDesc(): void
    {
        $collection = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ])->sortDesc();

        self::assertCount(5, $collection);
        self::assertEquals(DateTime::of('2021-01-05'), $collection->first());
        self::assertEquals(DateTime::of('2021-01-01'), $collection->last());
    }

    /**
     * @throws \Exception
     */
    public function testMostRecent(): void
    {
        $datetime = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ])->mostRecent();

        self::assertEquals(DateTime::of('2021-01-05'), $datetime);
    }

    /**
     * @throws \Exception
     */
    public function testOldest(): void
    {
        $datetime = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ])->oldest();

        self::assertEquals(DateTime::of('2021-01-01'), $datetime);
    }

    /**
     * @throws \Exception
     */
    public function testDatesBetween(): void
    {
        $collection = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ]);

        $dates = $collection->between(DateTime::of('2021-01-02'), DateTime::of('2021-01-04'));

        self::assertCount(3, $dates);
        self::assertEquals(DateTime::of('2021-01-02'), $dates[0]);
        self::assertEquals(DateTime::of('2021-01-03'), $dates[1]);
        self::assertEquals(DateTime::of('2021-01-04'), $dates[2]);
    }

    /**
     * @throws \Exception
     */
    public function testDatesBefore(): void
    {
        $collection = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ]);

        $dates = $collection->before(DateTime::of('2021-01-03'));

        self::assertCount(2, $dates);
        self::assertEquals(DateTime::of('2021-01-01'), $dates[0]);
        self::assertEquals(DateTime::of('2021-01-02'), $dates[1]);
    }

    /**
     * @throws \Exception
     */
    public function testDatesAfter(): void
    {
        $collection = DateTimeCollection::asList([
            DateTime::of('2021-01-01'),
            DateTime::of('2021-01-02'),
            DateTime::of('2021-01-03'),
            DateTime::of('2021-01-04'),
            DateTime::of('2021-01-05'),
        ]);

        $dates = $collection->after(DateTime::of('2021-01-03'));

        self::assertCount(2, $dates);
        self::assertEquals(DateTime::of('2021-01-04'), $dates[0]);
        self::assertEquals(DateTime::of('2021-01-05'), $dates[1]);
    }
}
