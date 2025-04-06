<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\VO\DateTime;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\DateTime;
use Atournayre\Tests\Fixtures\Birthday;
use PHPUnit\Framework\TestCase;

final class BirthdayTest extends TestCase
{
    /**
     * @throws ThrowableInterface
     */
    public function testIsAfter(): void
    {
        $birthday = Birthday::of('2020-01-01');
        $reference = DateTime::of('1900-01-01')->toDateTime();

        self::assertTrue($birthday->isAfter($reference)->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testEqualsTo(): void
    {
        $birthday = Birthday::of('2020-01-01');

        self::assertTrue($birthday->isSame(Birthday::of('2020-01-01')->toDateTime())->isTrue());
        self::assertFalse($birthday->isSame(Birthday::of('2020-01-02')->toDateTime())->isTrue());
    }
}
