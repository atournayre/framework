<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Common\Assert\Assert;

final class Int_
{
    private int $value;

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @param int|string|Int_ $value
     * @return self
     */
    public static function of($value): self
    {
        if ($value instanceof self) {
            return $value;
        }

        Assert::false(is_float($value), 'Integer::of() expects parameter 1 to be integer or string, '.gettype($value).' given');

        return new self((int) $value);
    }

    public function value(): int
    {
        return $this->value;
    }

    public function toString(): string
    {
        return (string) $this->value;
    }

    public function isPositive(): BoolEnum
    {
        $isPositive = $this->value > 0;

        return BoolEnum::fromBool($isPositive);
    }

    public function isNegative(): BoolEnum
    {
        $isNegative = $this->value < 0;

        return BoolEnum::fromBool($isNegative);
    }

    public function isZero(): BoolEnum
    {
        $isZero = $this->value === 0;

        return BoolEnum::fromBool($isZero);
    }

    public function abs(): self
    {
        return Int_::of(abs($this->value));
    }

    /**
     * @param int|Int_ $of
     * @param int|Int_ $of1
     * @return BoolEnum
     */
    public function between($of, $of1): BoolEnum
    {
        $of = self::of($of);
        $of1 = self::of($of1);

        $between = $this->value > $of->value()
            && $this->value < $of1->value();

        return BoolEnum::fromBool($between);
    }

    /**
     * @param Int_|int $of
     * @param Int_|int $of1
     * @return BoolEnum
     */
    public function betweenOrEqual($of, $of1): BoolEnum
    {
        $of = self::of($of);
        $of1 = self::of($of1);

        $betweenOrEqual = $this->value >= $of->value()
            && $this->value <= $of1->value();

        return BoolEnum::fromBool($betweenOrEqual);
    }

    public function isEven(): BoolEnum
    {
        $isEven = $this->value % 2 === 0;

        return BoolEnum::fromBool($isEven);
    }

    public function isOdd(): BoolEnum
    {
        $isOdd = $this->value % 2 !== 0;

        return BoolEnum::fromBool($isOdd);
    }

    /**
     * @param int|Int_ $of
     * @return BoolEnum
     */
    public function greaterThan($of): BoolEnum
    {
        $of = self::of($of);
        $greaterThan = $this->value > $of->value();

        return BoolEnum::fromBool($greaterThan);
    }

    /**
     * @param int|Int_ $of
     * @return BoolEnum
     */
    public function greaterThanOrEqual($of): BoolEnum
    {
        $of = self::of($of);
        $greaterThanOrEqual = $this->value >= $of->value();

        return BoolEnum::fromBool($greaterThanOrEqual);
    }

    /**
     * @param int|Int_ $of
     * @return BoolEnum
     */
    public function lessThan($of): BoolEnum
    {
        $of = self::of($of);
        $lessThan = $this->value < $of->value();

        return BoolEnum::fromBool($lessThan);
    }

    /**
     * @param int|Int_ $of
     * @return BoolEnum
     */
    public function lessThanOrEqual($of): BoolEnum
    {
        $of = self::of($of);
        $lessThanOrEqual = $this->value <= $of->value();

        return BoolEnum::fromBool($lessThanOrEqual);
    }

    /**
     * @param int|Int_ $of
     * @return BoolEnum
     */
    public function equalsTo($of): BoolEnum
    {
        $of = self::of($of);
        $equalsTo = $this->value === $of->value();

        return BoolEnum::fromBool($equalsTo);
    }
}
