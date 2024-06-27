<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Contracts\Log\LoggableInterface;

final class Numeric implements LoggableInterface
{
    private float $value;

    private int $intValue;

    private int $precision;

    /**
     * @param int|float|string $value
     *
     * @throws \InvalidArgumentException
     */
    public static function of($value, int $precision = 0): self
    {
        return new self($value, $precision);
    }

    /**
     * @param int|float|string $value
     *
     * @throws \InvalidArgumentException
     */
    private function __construct($value, int $precision)
    {
        if ($precision < 0) {
            throw new \InvalidArgumentException('Precision cannot be negative.');
        }

        if (is_string($value) && !is_numeric($value)) {
            throw new \InvalidArgumentException('The provided string value must be numeric.');
        }

        $numericValue = (float) $value;

        if (($numericValue < PHP_FLOAT_MIN || $numericValue > PHP_FLOAT_MAX) && 0.0 !== $numericValue) {
            throw new \InvalidArgumentException('The value is out of range for floating point numbers.');
        }

        $multiplier = 10 ** $precision;
        $intValue = intval(round($numericValue * $multiplier));

        if ($intValue < PHP_INT_MIN || $intValue > PHP_INT_MAX) {
            throw new \InvalidArgumentException(sprintf('The value %s exceeds the allowed limits.', $intValue));
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
     * @throws \RuntimeException
     */
    public function format(Locale $locale): string
    {
        $fmt = new \NumberFormatter($locale->code(), \NumberFormatter::DECIMAL);

        $format = $fmt->format($this->value);
        if (false === $format) {
            throw new \RuntimeException('Failed to format the number.');
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
                throw new \InvalidArgumentException('Invalid rounding mode provided.');
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
     * @throws \Exception
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
     * @throws \Exception
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

    public static function fromInt(int $value, int $precision): Numeric
    {
        return Numeric::of($value / (10 ** $precision), $precision);
    }

    public function toLog(): array
    {
        return [
            'value' => $this->value,
            'intValue' => $this->intValue,
            'precision' => $this->precision,
        ];
    }
}
