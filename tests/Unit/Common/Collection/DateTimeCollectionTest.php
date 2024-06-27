<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\Collection;

use Atournayre\Common\VO\DateTime\DateTime;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\DateTimeCollection;
use PHPUnit\Framework\TestCase;

final class DateTimeCollectionTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testOnlyAcceptsDateTimeObjects(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('All elements must be of type '.DateTime::class.'.');

        DateTimeCollection::asList([
            DateTime::of('2024-06-27'),
            'not a DateTime object',
        ]);
    }

    /**
     * @throws \Exception
     */
    public function testThrowErrorWhenNotDateTimeObjectAdded(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('All elements must be of type '.DateTime::class.'.');

        $dateTimeCollection = DateTimeCollection::asList([
            DateTime::of('2024-06-27'),
        ]);

        // @phpstan-ignore-next-line
        $dateTimeCollection[] = 'not a DateTime object';
    }

    /**
     * @throws \Exception
     */
    public function testAddElementConditionally(): void
    {
        $dateTimeCollection = DateTimeCollection::asList([
            DateTime::of('2024-06-27'),
        ])
            ->add(DateTime::of('2024-06-28'))
            ->add(DateTime::of('2024-06-28'), true)
            ->add(DateTime::of('2024-06-28'), BoolEnum::fromBool(true))
            ->add(DateTime::of('2024-06-28'), fn () => true)
            ->add(DateTime::of('2024-06-28'), fn (DateTime $dateTime) => $dateTime->isAfter(DateTime::of('2024-06-27')))
            ->add(DateTime::of('2024-06-28'), fn (DateTime $dateTime) => $dateTime->isAfter(new \DateTime('2024-06-27')))
        ;

        self::assertCount(7, $dateTimeCollection);
    }

    /**
     * @throws \Exception
     */
    public function testSetElementConditionally(): void
    {
        $dateTimeCollection = DateTimeCollection::asList([
            DateTime::of('2024-06-27'),
        ])
            ->set(1, DateTime::of('2024-06-28'), true)
            ->set(2, DateTime::of('2024-06-28'), BoolEnum::fromBool(true))
            ->set(3, DateTime::of('2024-06-28'), fn () => true)
            ->set(4, DateTime::of('2024-06-28'), fn (DateTime $dateTime) => $dateTime->isAfter(DateTime::of('2024-06-27')))
            ->set(5, DateTime::of('2024-06-28'), fn (DateTime $dateTime) => $dateTime->isAfter(new \DateTime('2024-06-27')))
        ;

        self::assertCount(6, $dateTimeCollection);
    }

    /**
     * @throws \Exception
     */
    public function testSortAscDateTimeCollection(): void
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
    public function testSortDescDateTimeCollection(): void
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
    public function testMostRecentDateFromDateTimeCollection(): void
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
    public function testOldestDateFromDateTimeCollection(): void
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
    public function testDatesBetweenInDateTimeCollection(): void
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
    public function testDatesBeforeFromDateTimeCollection(): void
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
    public function testDatesAfterFromDateTimeCollection(): void
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
