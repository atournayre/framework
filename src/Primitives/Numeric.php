<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Exception\InvalidArgumentException;
use Atournayre\Exception\RuntimeException;

final class Numeric
{
    private float $value;

    private int $intValue;

    private int $precision;

    /**
     * @throws ThrowableInterface
     */
    public static function fromFloat(float $float): self
    {
        $precision = StringType::of((string) $float)
            ->afterLast('.')
            ->length()
            ->intValue()
        ;

        return new self($float, $precision);
    }

    /**
     * @param int|float|string $value
     *
     * @throws ThrowableInterface
     */
    public static function of($value, int $precision = 0): self
    {
        return new self($value, $precision);
    }

    /**
     * @param int|float|string $value
     *
     * @throws ThrowableInterface
     */
    private function __construct($value, int $precision)
    {
        if ($precision < 0) {
            InvalidArgumentException::new('Precision cannot be negative.')->throw();
        }

        if (is_string($value) && !is_numeric($value)) {
            InvalidArgumentException::new('The provided string value must be numeric.')->throw();
        }

        $numericValue = (float) $value;

        if ((abs($numericValue) < PHP_FLOAT_MIN || abs($numericValue) > PHP_FLOAT_MAX) && 0.0 !== $numericValue) {
            $message = sprintf('The value %s is out of range [%s, %s] for floating point numbers.', $numericValue, PHP_FLOAT_MIN, PHP_FLOAT_MAX);
            InvalidArgumentException::new($message)->throw();
        }

        $multiplier = 10 ** $precision;
        $intValue = intval(round($numericValue * $multiplier));

        if ($intValue < PHP_INT_MIN || $intValue > PHP_INT_MAX) {
            $message = sprintf('The value %s exceeds the allowed limits [%s, %s].', $intValue, PHP_INT_MIN, PHP_INT_MAX);
            InvalidArgumentException::new($message)->throw();
        }

        $this->value = $numericValue;
        $this->intValue = $intValue;
        $this->precision = $precision;
    }

    /**
     * @api
     */
    public function value(): float
    {
        return $this->value;
    }

    /**
     * @api
     */
    public function intValue(): int
    {
        return $this->intValue;
    }

    /**
     * @api
     */
    public function precision(): int
    {
        return $this->precision;
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function format(Locale $locale): string
    {
        $fmt = new \NumberFormatter($locale->code(), \NumberFormatter::DECIMAL);

        $format = $fmt->format($this->value);
        if (false === $format) {
            RuntimeException::new('Not implemented yet!')->throw();
        }

        return $format;
    }

    /**
     * @api
     */
    public function round(int $mode = PHP_ROUND_HALF_UP): self
    {
        switch ($mode) {
            case PHP_ROUND_HALF_UP:
                return new self(round($this->value, $this->precision), $this->precision);
            case PHP_ROUND_HALF_DOWN:
                return new self(round($this->value, $this->precision, PHP_ROUND_HALF_DOWN), $this->precision);
            case PHP_ROUND_HALF_EVEN:
                return new self(round($this->value, $this->precision, PHP_ROUND_HALF_EVEN), $this->precision);
            case PHP_ROUND_HALF_ODD:
                return new self(round($this->value, $this->precision, PHP_ROUND_HALF_ODD), $this->precision);
            default:
                InvalidArgumentException::new('Invalid rounding mode provided.')->throw();
        }
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function greaterThan($numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $greaterThan = $this->value > $that->intValue();

        return BoolEnum::fromBool($greaterThan);
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function greaterThanOrEqual($numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $greaterThanOrEqual = $this->value >= $that->value();

        return BoolEnum::fromBool($greaterThanOrEqual);
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function lessThan($numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $lessThan = $this->value < $that->value();

        return BoolEnum::fromBool($lessThan);
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function lessThanOrEqual($numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $lessThanOrEqual = $this->value <= $that->value();

        return BoolEnum::fromBool($lessThanOrEqual);
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function equalTo($numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $equalTo = $this->value === $that->value();

        return BoolEnum::fromBool($equalTo);
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function notEqualTo($numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $equalTo = $this->value !== $that->value();

        return BoolEnum::fromBool($equalTo);
    }

    /**
     * @api
     *
     * @param int|Numeric $min
     * @param int|Numeric $max
     *
     * @throws ThrowableInterface
     */
    public function between($min, $max): BoolEnum
    {
        Numeric::of($min)
            ->greaterThan($max)
            ->throwIfTrue('The minimum value must be less than the maximum value.')
        ;

        $between = $this->greaterThan($min)->isTrue()
            && $this->lessThan($max)->isTrue();

        return BoolEnum::fromBool($between);
    }

    /**
     * @api
     *
     * @param int|Numeric $min
     * @param int|Numeric $max
     *
     * @throws ThrowableInterface
     */
    public function betweenOrEqual($min, $max): BoolEnum
    {
        Numeric::of($min)
            ->greaterThan($max)
            ->throwIfTrue('The minimum value must be less than the maximum value.')
        ;

        $between = $this->greaterThanOrEqual($min)->isTrue()
            && $this->lessThanOrEqual($max)->isTrue();

        return BoolEnum::fromBool($between);
    }

    /**
     * @api
     */
    public static function fromInt(int $value, int $precision): Numeric
    {
        return Numeric::of($value, $precision);
    }

    /**
     * @api
     */
    public function isZero(): BoolEnum
    {
        $isZero = $this->equalTo(0)
            ->isTrue()
        ;

        return BoolEnum::fromBool($isZero);
    }

    /**
     * @api
     */
    public function abs(): self
    {
        $abs = abs($this->value);

        return new self($abs, $this->precision);
    }
}
