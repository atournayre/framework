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
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isAfter(new \DateTime('2024-06-17')));
    }

    /**
     * @throws \Exception
     */
    public function testIsAfterOrEqual(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isAfterOrEqual(new \DateTime('2024-06-18')));
    }

    /**
     * @throws \Exception
     */
    public function testIsBefore(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isBefore(new \DateTime('2024-06-19')));
    }

    /**
     * @throws \Exception
     */
    public function testIsBeforeOrEqual(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isBeforeOrEqual(new \DateTime('2024-06-18')));
    }

    /**
     * @throws \Exception
     */
    public function testIsBetween(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isBetween(new \DateTime('2024-06-17'), new \DateTime('2024-06-19')));
    }

    /**
     * @throws \Exception
     */
    public function testIsBetweenOrEqual(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isBetweenOrEqual(new \DateTime('2024-06-18'), new \DateTime('2024-06-19')));
    }

    /**
     * @throws \Exception
     */
    public function testIsNotBetween(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isNotBetween(new \DateTime('2024-06-16'), new \DateTime('2024-06-17')));
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
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isSame(new \DateTime('2024-06-18')));
    }

    /**
     * @throws \Exception
     */
    public function testIsSameOrAfter(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isSameOrAfter(new \DateTime('2024-06-17')));
    }

    /**
     * @throws \Exception
     */
    public function testIsSameOrBefore(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isSameOrBefore(new \DateTime('2024-06-19')));
    }

    /**
     * @throws \Exception
     */
    public function testIsSameOrBetween(): void
    {
        $dateTime = DateTime::fromInterface(new \DateTime('2024-06-18'));
        self::assertTrue($dateTime->isSameOrBetween(new \DateTime('2024-06-17'), new \DateTime('2024-06-19')));
    }
}
