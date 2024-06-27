<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\VO\DateTime;

use Atournayre\Common\VO\DateTime\DateTime;
use PHPUnit\Framework\TestCase;

final class DateTimeTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testIsAM(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));

        self::assertTrue($dateTime->isAM());
    }

    /**
     * @throws \Exception
     */
    public function testIsAfter(): void
    {
        $splDatetime = new \DateTime('2024-06-18');
        $dateTime = DateTime::fromInterface($splDatetime);

        $expected = [
            new \DateTime('2024-06-17'),
            DateTime::fromInterface(new \DateTime('2024-06-17')),
        ];

        foreach ($expected as $date) {
            self::assertTrue($dateTime->isAfter($date));
        }
    }

    /**
     * @throws \Exception
     */
    public function testIsAfterOrEqual(): void
    {
        $splDatetime = new \DateTime('2024-06-18');
        $dateTime = DateTime::fromInterface($splDatetime);

        $expected = [
            new \DateTime('2024-06-18'),
            DateTime::fromInterface(new \DateTime('2024-06-18')),
        ];

        foreach ($expected as $date) {
            self::assertTrue($dateTime->isAfterOrEqual($date));
        }
    }

    /**
     * @throws \Exception
     */
    public function testIsBefore(): void
    {
        $splDatetime = new \DateTime('2024-06-18');
        $dateTime = DateTime::fromInterface($splDatetime);

        $expected = [
            new \DateTime('2024-06-19'),
            DateTime::fromInterface(new \DateTime('2024-06-19')),
        ];

        foreach ($expected as $date) {
            self::assertTrue($dateTime->isBefore($date));
        }
    }

    /**
     * @throws \Exception
     */
    public function testIsBeforeOrEqual(): void
    {
        $splDatetime = new \DateTime('2024-06-18');
        $dateTime = DateTime::fromInterface($splDatetime);

        $expected = [
            new \DateTime('2024-06-18'),
            DateTime::fromInterface(new \DateTime('2024-06-18')),
        ];

        foreach ($expected as $date) {
            self::assertTrue($dateTime->isBeforeOrEqual($date));
        }
    }

    /**
     * @throws \Exception
     */
    public function testIsBetween(): void
    {
        $splDatetime = new \DateTime('2024-06-18');
        $dateTime = DateTime::fromInterface($splDatetime);

        $expected = [
            [new \DateTime('2024-06-17'), new \DateTime('2024-06-19')],
            [DateTime::fromInterface(new \DateTime('2024-06-17')), DateTime::fromInterface(new \DateTime('2024-06-19'))],
        ];

        foreach ($expected as $dates) {
            self::assertTrue($dateTime->isBetween($dates[0], $dates[1]));
        }
    }

    /**
     * @throws \Exception
     */
    public function testIsBetweenOrEqual(): void
    {
        $splDatetime = new \DateTime('2024-06-18');
        $dateTime = DateTime::fromInterface($splDatetime);

        $expected = [
            [new \DateTime('2024-06-18'), new \DateTime('2024-06-19')],
            [DateTime::fromInterface(new \DateTime('2024-06-18')), DateTime::fromInterface(new \DateTime('2024-06-19'))],
        ];

        foreach ($expected as $dates) {
            self::assertTrue($dateTime->isBetweenOrEqual($dates[0], $dates[1]));
        }
    }

    /**
     * @throws \Exception
     */
    public function testIsNotBetween(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));

        $expected = [
            [new \DateTime('2024-06-16'), new \DateTime('2024-06-17')],
            [DateTime::fromInterface(new \DateTime('2024-06-16')), DateTime::fromInterface(new \DateTime('2024-06-17'))],
        ];

        foreach ($expected as $dates) {
            self::assertTrue($dateTime->isNotBetween($dates[0], $dates[1]));
        }
    }

    /**
     * @throws \Exception
     */
    public function testToDateTime(): void
    {
        $dateTime = new \DateTime('2024-06-18');
        $dateTimeVO = DateTime::fromInterface($dateTime);
        self::assertEquals($dateTime, $dateTimeVO->toDateTime());
    }

    /**
     * @throws \Exception
     */
    public function testIsWeekday(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));

        self::assertTrue($dateTime->isWeekday());
    }

    /**
     * @throws \Exception
     */
    public function testIsWeekend(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));

        self::assertFalse($dateTime->isWeekend());
    }

    /**
     * @throws \Exception
     */
    public function testIsPM(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18 12:00:00'));

        self::assertTrue($dateTime->isPM());
    }

    /**
     * @throws \Exception
     */
    public function testIsSame(): void
    {
        $splDatetime = new \DateTime('2024-06-18');
        $dateTime = DateTime::fromInterface($splDatetime);

        $expected = [
            new \DateTime('2024-06-18'),
            DateTime::fromInterface(new \DateTime('2024-06-18')),
        ];

        foreach ($expected as $date) {
            self::assertTrue($dateTime->isSame($date));
        }
    }

    /**
     * @throws \Exception
     */
    public function testIsSameOrAfter(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));

        $expected = [
            new \DateTime('2024-06-17'),
            DateTime::fromInterface(new \DateTime('2024-06-17')),
        ];

        foreach ($expected as $date) {
            self::assertTrue($dateTime->isSameOrAfter($date));
        }
    }

    /**
     * @throws \Exception
     */
    public function testIsSameOrBefore(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));

        $expected = [
            new \DateTime('2024-06-19'),
            DateTime::fromInterface(new \DateTime('2024-06-19')),
        ];

        foreach ($expected as $date) {
            self::assertTrue($dateTime->isSameOrBefore($date));
        }
    }

    /**
     * @throws \Exception
     */
    public function testIsSameOrBetween(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));

        $expected = [
            [new \DateTime('2024-06-17'), new \DateTime('2024-06-19')],
            [DateTime::fromInterface(new \DateTime('2024-06-17')), DateTime::fromInterface(new \DateTime('2024-06-19'))],
        ];

        foreach ($expected as $dates) {
            self::assertTrue($dateTime->isSameOrBetween($dates[0], $dates[1]));
        }
    }
}
