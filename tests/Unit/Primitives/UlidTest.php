<?php

declare(strict_types=1);

namespace Unit\Primitives;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\DateTime;
use Atournayre\Primitives\Ulid;
use PHPUnit\Framework\TestCase;

final class UlidTest extends TestCase
{
    /**
     * @throws ThrowableInterface
     */
    public function testFromString(): void
    {
        $uuid = Ulid::of('01E439TP9XJZ9RPFH3T1PYBCR8');
        self::assertTrue($uuid->dateTime()->isSame(DateTime::of('2020-03-23 08:58:27.517000')->toDateTime())->isTrue());
        self::assertSame('01E439TP9XJZ9RPFH3T1PYBCR8', $uuid->toString());
        self::assertTrue($uuid->equalsTo(Ulid::of('01E439TP9XJZ9RPFH3T1PYBCR8'))->isTrue());
        self::assertTrue($uuid->toRfc4122()->equalsTo('0171069d-593d-97d3-8b3e-23d06de5b308')->isTrue());
    }
}
