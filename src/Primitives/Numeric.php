<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Exception\ThrowableInterface;

final readonly class Numeric
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
     * @throws ThrowableInterface
     */
    public static function of(float|int|string $value, int $precision = 0): self
    {
        return new self($value, $precision);
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public static function zero(int $precision = 0): self
    {
        return self::of(0, $precision);
    }

    /**
     * @throws ThrowableInterface
     */
    private function __construct(
        float|int|string $value,
        int $precision,
    ) {
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
     * @throws ThrowableInterface
     *
     * @api
     */
    public function format(Locale $locale): string
    {
        $fmt = new \NumberFormatter($locale->code(), \NumberFormatter::DECIMAL);

        $format = $fmt->format($this->value);
        if (false === $format) {
            RuntimeException::new('Failed to format the number.')->throw();
        }

        return $format;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function round(int $mode = PHP_ROUND_HALF_UP): self
    {
        return match ($mode) {
            PHP_ROUND_HALF_UP => new self(round($this->value, $this->precision), $this->precision),
            PHP_ROUND_HALF_DOWN => new self(round($this->value, $this->precision, PHP_ROUND_HALF_DOWN), $this->precision),
            PHP_ROUND_HALF_EVEN => new self(round($this->value, $this->precision, PHP_ROUND_HALF_EVEN), $this->precision),
            PHP_ROUND_HALF_ODD => new self(round($this->value, $this->precision, PHP_ROUND_HALF_ODD), $this->precision),
            default => InvalidArgumentException::new('Invalid rounding mode provided.')->throw(),
        };
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function greaterThan($numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $greaterThan = $this->value > $that->intValue();

        return BoolEnum::fromBool($greaterThan);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function greaterThanOrEqual($numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $greaterThanOrEqual = $this->value >= $that->value();

        return BoolEnum::fromBool($greaterThanOrEqual);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lessThan($numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $lessThan = $this->value < $that->value();

        return BoolEnum::fromBool($lessThan);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lessThanOrEqual($numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $lessThanOrEqual = $this->value <= $that->value();

        return BoolEnum::fromBool($lessThanOrEqual);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function equalTo($numeric): BoolEnum
    {
        $that = $numeric instanceof self ? $numeric : self::of($numeric);
        $equalTo = $this->value === $that->value();

        return BoolEnum::fromBool($equalTo);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     *
     * @api
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
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function fromInt(int $value, int $precision): Numeric
    {
        return Numeric::of($value, $precision);
    }

    /**
     * @throws ThrowableInterface
     *
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
     * @throws ThrowableInterface
     *
     * @api
     */
    public function abs(): self
    {
        $abs = abs($this->value);

        return new self($abs, $this->precision);
    }
}
