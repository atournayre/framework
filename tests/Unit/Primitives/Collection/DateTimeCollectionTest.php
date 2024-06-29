<?php

declare(strict_types=1);

namespace Atournayre\Tests\Primitives\Collection;

use Atournayre\Common\VO\DateTime\DateTime;
use Atournayre\Primitives\Collection\DateTimeCollection;
use PHPUnit\Framework\TestCase;

class DateTimeCollectionTest extends TestCase
{
    /**
     * @throws \Throwable
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

        self::assertSame(5, $collection->count());
        self::assertEquals(DateTime::of('2021-01-01'), $collection->first());
        self::assertEquals(DateTime::of('2021-01-05'), $collection->last());
    }

    /**
     * @throws \Throwable
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

        self::assertSame(5, $collection->count());
        self::assertEquals(DateTime::of('2021-01-05'), $collection->first());
        self::assertEquals(DateTime::of('2021-01-01'), $collection->last());
    }

    /**
     * @throws \Throwable
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
     * @throws \Throwable
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
     * @throws \Throwable
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

        self::assertSame(3, $dates->count());
        self::assertEquals(DateTime::of('2021-01-02'), $dates->offsetGet(0));
        self::assertEquals(DateTime::of('2021-01-03'), $dates->offsetGet(1));
        self::assertEquals(DateTime::of('2021-01-04'), $dates->offsetGet(2));
    }

    /**
     * @throws \Throwable
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

        self::assertSame(2, $dates->count());
        self::assertEquals(DateTime::of('2021-01-01'), $dates->offsetGet(0));
        self::assertEquals(DateTime::of('2021-01-02'), $dates->offsetGet(1));
    }

    /**
     * @throws \Throwable
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

        self::assertSame(2, $dates->count());
        self::assertEquals(DateTime::of('2021-01-04'), $dates->offsetGet(0));
        self::assertEquals(DateTime::of('2021-01-05'), $dates->offsetGet(1));
    }
}
