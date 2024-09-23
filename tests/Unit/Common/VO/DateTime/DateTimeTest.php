<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\VO\DateTime;

use Atournayre\Primitives\DateTime;
use PHPUnit\Framework\TestCase;

final class DateTimeTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCreateDateTime(): void
    {
        $dateTime = DateTime::of('2024-06-19');
        self::assertEquals('2024-06-19', $dateTime->toDateTime()->format('Y-m-d'));

        $dateTime = DateTime::of(new \DateTime('2024-06-18'), new \DateTimeZone('Europe/Paris'));
        self::assertEquals('Europe/Paris', $dateTime->toDateTime()->getTimezone()->getName());

        $dateTime = DateTime::of(1719743137, new \DateTimeZone('Europe/Paris'));
        self::assertEquals('Europe/Paris', $dateTime->toDateTime()->getTimezone()->getName());

        $dateTime = DateTime::of('2024-06-18');
        $newDateTime = DateTime::of($dateTime, new \DateTimeZone('Europe/Paris'));
        self::assertEquals('2024-06-18', $newDateTime->toDateTime()->format('Y-m-d'));
        self::assertEquals('Europe/Paris', $newDateTime->toDateTime()->getTimezone()->getName());
    }

    /**
     * @throws \Exception
     */
    public function testIsAM(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isAM()->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsAfter(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isAfter(new \DateTime('2024-06-17'))->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsAfterOrEqual(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isAfterOrEqual(new \DateTime('2024-06-18'))->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsBefore(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isBefore(new \DateTime('2024-06-19'))->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsBeforeOrEqual(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isBeforeOrEqual(new \DateTime('2024-06-18'))->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsBetween(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isBetween(new \DateTime('2024-06-17'), new \DateTime('2024-06-19'))->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsBetweenOrEqual(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isBetweenOrEqual(new \DateTime('2024-06-18'), new \DateTime('2024-06-19'))->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsNotBetween(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isNotBetween(new \DateTime('2024-06-16'), new \DateTime('2024-06-17'))->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testToDateTime(): void
    {
        $dateTime = new \DateTime('2024-06-18');
        $dateTimeVO = DateTime::of($dateTime);
        self::assertEquals($dateTime, $dateTimeVO->toDateTime());
    }

    /**
     * @throws \Exception
     */
    public function testIsWeekday(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isWeekday()->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsWeekend(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertFalse($dateTime->isWeekend()->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsPM(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18 12:00:00'));
        self::assertTrue($dateTime->isPM()->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsSame(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isSame(new \DateTime('2024-06-18'))->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsSameOrAfter(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isSameOrAfter(new \DateTime('2024-06-17'))->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsSameOrBefore(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isSameOrBefore(new \DateTime('2024-06-19'))->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testIsSameOrBetween(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isSameOrBetween(new \DateTime('2024-06-17'), new \DateTime('2024-06-19'))->isTrue());
    }

    /**
     * @throws \Exception
     */
    public function testNumberOfDaysIsLowerThanOrEquals(): void
    {
        $dateTime = DateTime::of(new \DateTime('2024-06-01'));
        self::assertFalse($dateTime->numberOfDaysIsLowerThanOrEquals('2024-06-17', 7)->asBool());

        $dateTime = DateTime::of(new \DateTime('2024-06-01'));
        self::assertTrue($dateTime->numberOfDaysIsLowerThanOrEquals(DateTime::of('2024-06-07'), 7)->asBool());
    }
}
