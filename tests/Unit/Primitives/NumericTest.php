<?php

declare(strict_types=1);

namespace Atournayre\Tests\Primitives;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Locale;
use Atournayre\Primitives\Numeric;
use PHPUnit\Framework\TestCase;

final class NumericTest extends TestCase
{
    public function testOfWithInteger(): void
    {
        $number = Numeric::of(123, 2);
        self::assertEquals(12300, $number->intValue());
        self::assertEquals(2, $number->precision());
        self::assertEquals(123.00, $number->value());
    }

    public function testOfWithFloat(): void
    {
        $number = Numeric::of(1.23, 2);
        self::assertEquals(123, $number->intValue());
        self::assertEquals(2, $number->precision());
        self::assertEquals(1.23, $number->value());
    }

    public function testOfWithString(): void
    {
        $number = Numeric::of('1.23', 2);
        self::assertEquals(123, $number->intValue());
        self::assertEquals(2, $number->precision());
        self::assertEquals(1.23, $number->value());
    }

    public function testOfWithNegativePrecision(): void
    {
        self::expectException(\InvalidArgumentException::class);
        Numeric::of(1.23, -1);
    }

    public function testOfWithNonNumericString(): void
    {
        self::expectException(\InvalidArgumentException::class);
        Numeric::of('abc', 2);
    }

    public function testFormat(): void
    {
        $number = Numeric::of(1234.56, 2);
        $formattedValue = $number->format(Locale::of(Locale::EN_US));
        self::assertEquals('1,234.56', $formattedValue);
    }

    public function testRoundWithDefaultMode(): void
    {
        $number = Numeric::of(1.234567, 2);
        $roundedNumber = $number->round();
        self::assertEquals(1.23, $roundedNumber->value());
    }

    public function testRoundWithPHPRoundHalfUp(): void
    {
        $number = Numeric::of(1.235, 2);
        $roundedNumber = $number->round(PHP_ROUND_HALF_UP);
        self::assertEquals(1.24, $roundedNumber->value());
    }

    public function testRoundWithPHPRoundHalfDown(): void
    {
        $number = Numeric::of(1.235, 2);
        $roundedNumber = $number->round(PHP_ROUND_HALF_DOWN);
        self::assertEquals(1.23, $roundedNumber->value());
    }

    public function testRoundWithPHPRoundHalfEven(): void
    {
        $number = Numeric::of(1.245, 2);
        $roundedNumber = $number->round(PHP_ROUND_HALF_EVEN);
        self::assertEquals(1.24, $roundedNumber->value());
    }

    public function testRoundWithPHPRoundHalfOdd(): void
    {
        $number = Numeric::of(1.255, 2);
        $roundedNumber = $number->round(PHP_ROUND_HALF_ODD);
        self::assertEquals(1.25, $roundedNumber->value());
    }

    public function testGreaterThan(): void
    {
        $number = Numeric::of(2);
        $greaterThan = $number->greaterThan(1);
        self::assertTrue($greaterThan->yes());
    }

    public function testGreaterThanOrEqual(): void
    {
        $number = Numeric::of(2);
        $greaterThanOrEqual = $number->greaterThanOrEqual(2);
        self::assertTrue($greaterThanOrEqual->yes());
    }

    public function testLessThan(): void
    {
        $number = Numeric::of(2);
        $lessThan = $number->lessThan(3);
        self::assertTrue($lessThan->yes());
    }

    public function testLessThanOrEqual(): void
    {
        $number = Numeric::of(2);
        $lessThanOrEqual = $number->lessThanOrEqual(2);
        self::assertTrue($lessThanOrEqual->yes());
    }

    public function testEqualTo(): void
    {
        $number = Numeric::of(2);
        $equalTo = $number->equalTo(2);
        self::assertTrue($equalTo->yes());
    }

    public function testNotEqualTo(): void
    {
        $number = Numeric::of(2);
        $notEqualTo = $number->notEqualTo(3);
        self::assertTrue($notEqualTo->yes());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testBetween(): void
    {
        $number = Numeric::of(2);
        $between = $number->between(1, 3);
        self::assertTrue($between->yes());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testBetweenWithInvertedBounds(): void
    {
        self::expectException(\InvalidArgumentException::class);
        Numeric::of(2)->between(3, 1);
    }

    /**
     * @throws ThrowableInterface
     */
    public function testBetweenOrEqual(): void
    {
        $number = Numeric::of(2);
        $betweenOrEqual = $number->betweenOrEqual(2, 3);
        self::assertTrue($betweenOrEqual->yes());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testBetweenOrEqualWithInvertedBounds(): void
    {
        self::expectException(\InvalidArgumentException::class);
        Numeric::of(2)->betweenOrEqual(3, 2);
    }

    public function testNumericFromFloat(): void
    {
        $number = Numeric::fromFloat(1.23);
        self::assertEquals(123, $number->intValue());
        self::assertEquals(2, $number->precision());
        self::assertEquals(1.23, $number->value());
    }

    public function testIsZero(): void
    {
        $number = Numeric::of(0);
        self::assertTrue($number->isZero()->yes());
    }

    public function testFloatIsNegative(): void
    {
        $number = Numeric::fromFloat(-272.03);
        self::assertEquals(-27203, $number->intValue());
        self::assertEquals(2, $number->precision());
        self::assertEquals(-272.03, $number->value());
    }

    public function testIntIsNegative(): void
    {
        $number = Numeric::fromInt(-272, 0);
        self::assertEquals(-272, $number->intValue());
        self::assertEquals(0, $number->precision());
        self::assertEquals(-272, $number->value());
    }

    public function testAbsoluteValue(): void
    {
        $number = Numeric::fromInt(-272, 0);
        self::assertEquals(272, $number->abs()->intValue(), 'Absolute value of -272 is 272');

        $number = Numeric::fromFloat(-272.03);
        self::assertEquals(272.03, $number->abs()->value(), 'Absolute value of -272.03 is 272.03');

        $number = Numeric::fromFloat(-272.03);
        self::assertEquals(272.03, $number->abs()->value(), 'Absolute value of -272.03 is 272.03');

        $number = Numeric::fromInt(272, 0);
        self::assertEquals(272, $number->abs()->intValue(), 'Absolute value of 272 is 272');
    }

    /**
     * @throws ThrowableInterface
     */
    public function testZeroWithPrecisionZero(): void
    {
        $zero = Numeric::zero(0);

        self::assertEquals(0.0, $zero->value());
        self::assertEquals(0, $zero->intValue());
        self::assertEquals(0, $zero->precision());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testZeroWithPositivePrecision(): void
    {
        $zero = Numeric::zero(2);

        self::assertEquals(0.0, $zero->value());
        self::assertEquals(0, $zero->intValue());
        self::assertEquals(2, $zero->precision());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testZeroWithPrecisionThree(): void
    {
        $zero = Numeric::zero(3);

        self::assertEquals(0.0, $zero->value());
        self::assertEquals(0, $zero->intValue());
        self::assertEquals(3, $zero->precision());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testZeroWithDefaultPrecision(): void
    {
        $zero = Numeric::zero();

        self::assertEquals(0.0, $zero->value());
        self::assertEquals(0, $zero->intValue());
        self::assertEquals(0, $zero->precision());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testZeroWithPrecisionOne(): void
    {
        $zero = Numeric::zero(1);

        self::assertEquals(0.0, $zero->value());
        self::assertEquals(0, $zero->intValue());
        self::assertEquals(1, $zero->precision());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testZeroReturnsNewInstance(): void
    {
        $zero1 = Numeric::zero(2);
        $zero2 = Numeric::zero(2);

        self::assertNotSame($zero1, $zero2);
        self::assertEquals(0.0, $zero1->value());
        self::assertEquals(0.0, $zero2->value());
        self::assertEquals(2, $zero1->precision());
        self::assertEquals(2, $zero2->precision());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testZeroIsZero(): void
    {
        // Test with default precision
        $zero = Numeric::zero();
        self::assertTrue($zero->isZero()->yes());

        // Test with precision 0
        $zero = Numeric::zero(0);
        self::assertTrue($zero->isZero()->yes());

        // Test with positive precision
        $zero = Numeric::zero(2);
        self::assertTrue($zero->isZero()->yes());

        // Test with higher precision
        $zero = Numeric::zero(5);
        self::assertTrue($zero->isZero()->yes());
    }
}
