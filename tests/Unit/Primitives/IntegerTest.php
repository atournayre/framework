<?php

declare(strict_types=1);

namespace Unit\Primitives;

use Atournayre\Primitives\Int_;
use PHPUnit\Framework\TestCase;

final class IntegerTest extends TestCase
{
    public function testConstructor(): void
    {
        $integer = Int_::of(1);

        self::assertSame(1, $integer->value());
    }

    public function testToString(): void
    {
        $integer = Int_::of(1);

        self::assertSame('1', $integer->toString());
    }

    public function testFromString(): void
    {
        $integer = Int_::of('1');

        self::assertSame(1, $integer->value());
    }

    public function testFromFloat(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Integer::of() expects parameter 1 to be integer or string, double given');

        Int_::of(1.1);
    }

    public function testIsPositive(): void
    {
        $integer = Int_::of(1);

        self::assertTrue($integer->isPositive()->isTrue());
    }

    public function testIsNegative(): void
    {
        $integer = Int_::of(-1);

        self::assertTrue($integer->isNegative()->isTrue());
    }

    public function testIsZero(): void
    {
        $integer = Int_::of(0);
        self::assertTrue($integer->isZero()->isTrue());
    }

    public function testAbs(): void
    {
        $integer = Int_::of(-1);
        self::assertSame(1, $integer->abs()->value());
    }

    public function testBetween(): void
    {
        $integer = Int_::of(1);
        self::assertTrue($integer->between(Int_::of(0), Int_::of(2))->isTrue());
        self::assertTrue($integer->between(0, Int_::of(2))->isTrue());
        self::assertTrue($integer->between(Int_::of(0), 2)->isTrue());
        self::assertTrue($integer->between(Int_::of(0), Int_::of(1))->isFalse());
        self::assertTrue($integer->between(Int_::of(2), Int_::of(3))->isFalse());
    }

    public function testBetweenOrEqual(): void
    {
        $integer = Int_::of(1);
        self::assertTrue($integer->betweenOrEqual(Int_::of(0), Int_::of(2))->isTrue());
        self::assertTrue($integer->betweenOrEqual(0, Int_::of(2))->isTrue());
        self::assertTrue($integer->betweenOrEqual(Int_::of(0), 2)->isTrue());
        self::assertTrue($integer->betweenOrEqual(Int_::of(0), Int_::of(1))->isTrue());
        self::assertTrue($integer->betweenOrEqual(Int_::of(2), Int_::of(3))->isFalse());
    }

    public function testIsEven(): void
    {
        $integer = Int_::of(2);
        self::assertTrue($integer->isEven()->isTrue());
    }

    public function testIsOdd(): void
    {
        $integer = Int_::of(3);
        self::assertTrue($integer->isOdd()->isTrue());
    }

    public function testGreaterThan(): void
    {
        $integer = Int_::of(1);
        self::assertTrue($integer->greaterThan(Int_::of(0))->isTrue());
        self::assertTrue($integer->greaterThan(0)->isTrue());
        self::assertTrue($integer->greaterThan(Int_::of(1))->isFalse());
    }

    public function testGreaterThanOrEqual(): void
    {
        $integer = Int_::of(1);
        self::assertTrue($integer->greaterThanOrEqual(Int_::of(0))->isTrue());
        self::assertTrue($integer->greaterThanOrEqual(0)->isTrue());
        self::assertTrue($integer->greaterThanOrEqual(Int_::of(1))->isTrue());
        self::assertTrue($integer->greaterThanOrEqual(Int_::of(2))->isFalse());
    }

    public function testLessThan(): void
    {
        $integer = Int_::of(1);
        self::assertTrue($integer->lessThan(Int_::of(0))->isFalse());
        self::assertTrue($integer->lessThan(0)->isFalse());
        self::assertTrue($integer->lessThan(Int_::of(2))->isTrue());
    }

    public function testLessThanOrEqual(): void
    {
        $integer = Int_::of(1);
        self::assertTrue($integer->lessThanOrEqual(Int_::of(0))->isFalse());
        self::assertTrue($integer->lessThanOrEqual(0)->isFalse());
        self::assertTrue($integer->lessThanOrEqual(Int_::of(1))->isTrue());
        self::assertTrue($integer->lessThanOrEqual(Int_::of(2))->isTrue());
    }

    public function testEqualsTo(): void
    {
        $integer = Int_::of(1);
        self::assertTrue($integer->equalsTo(Int_::of(1))->isTrue());
        self::assertTrue($integer->equalsTo(1)->isTrue());
        self::assertTrue($integer->equalsTo(Int_::of(2))->isFalse());
        self::assertTrue($integer->equalsTo(2)->isFalse());
    }
}
