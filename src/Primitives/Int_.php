<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Exception\ThrowableInterface;

final class Int_
{
    private int $value;

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @param int|string|Int_ $value
     *
     * @throws ThrowableInterface
     */
    public static function of($value): self
    {
        if ($value instanceof self) {
            return $value;
        }

        Assert::false(is_float($value), 'Integer::of() expects parameter 1 to be integer or string, '.gettype($value).' given');

        return new self((int) $value);
    }

    /**
     * @api
     */
    public function value(): int
    {
        return $this->value;
    }

    /**
     * @api
     */
    public function toString(): string
    {
        return (string) $this->value;
    }

    /**
     * @api
     */
    public function isPositive(): BoolEnum
    {
        $isPositive = $this->value > 0;

        return BoolEnum::fromBool($isPositive);
    }

    /**
     * @api
     */
    public function isNegative(): BoolEnum
    {
        $isNegative = $this->value < 0;

        return BoolEnum::fromBool($isNegative);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function isZero(): BoolEnum
    {
        return $this->equalsTo(0);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function abs(): self
    {
        return Int_::of(abs($this->value));
    }

    /**
     * @param int|Int_ $of
     * @param int|Int_ $of1
     *
     * @throws ThrowableInterface
     *
     * @api
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
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function betweenOrEqual($of, $of1): BoolEnum
    {
        $of = self::of($of);
        $of1 = self::of($of1);

        $betweenOrEqual = $this->value >= $of->value()
            && $this->value <= $of1->value();

        return BoolEnum::fromBool($betweenOrEqual);
    }

    /**
     * @api
     */
    public function isEven(): BoolEnum
    {
        $isEven = 0 === $this->value % 2;

        return BoolEnum::fromBool($isEven);
    }

    /**
     * @api
     */
    public function isOdd(): BoolEnum
    {
        $isOdd = 0 !== $this->value % 2;

        return BoolEnum::fromBool($isOdd);
    }

    /**
     * @param int|Int_ $of
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function greaterThan($of): BoolEnum
    {
        $of = self::of($of);
        $greaterThan = $this->value > $of->value();

        return BoolEnum::fromBool($greaterThan);
    }

    /**
     * @param int|Int_ $of
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function greaterThanOrEqual($of): BoolEnum
    {
        $of = self::of($of);
        $greaterThanOrEqual = $this->value >= $of->value();

        return BoolEnum::fromBool($greaterThanOrEqual);
    }

    /**
     * @param int|Int_ $of
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lessThan($of): BoolEnum
    {
        $of = self::of($of);
        $lessThan = $this->value < $of->value();

        return BoolEnum::fromBool($lessThan);
    }

    /**
     * @param int|Int_ $of
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lessThanOrEqual($of): BoolEnum
    {
        $of = self::of($of);
        $lessThanOrEqual = $this->value <= $of->value();

        return BoolEnum::fromBool($lessThanOrEqual);
    }

    /**
     * @param int|Int_ $of
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function equalsTo($of): BoolEnum
    {
        $of = self::of($of);
        $equalsTo = $this->value === $of->value();

        return BoolEnum::fromBool($equalsTo);
    }
}
