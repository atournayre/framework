<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Exception\RuntimeException;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Locale;
use Atournayre\Primitives\Numeric;

trait NumericTrait
{
    protected Numeric $value;

    private function __construct(Numeric $value)
    {
        $this->value = $value;
    }

    public static function of(string $value): self
    {
        return new self(Numeric::of($value));
    }

    /**
     * @api
     */
    public function value(): float
    {
        return $this->value->value();
    }

    /**
     * @api
     */
    public function intValue(): int
    {
        return $this->value->intValue();
    }

    /**
     * @api
     */
    public function precision(): int
    {
        return $this->value->precision();
    }

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function format(Locale $locale): string
    {
        try {
            return $this->value->format($locale);
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }

    /**
     * @api
     */
    public function round(int $mode = PHP_ROUND_HALF_UP): self
    {
        return new self($this->value->round($mode));
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function greaterThan($numeric): BoolEnum
    {
        return $this->value->greaterThan($numeric);
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function greaterThanOrEqual($numeric): BoolEnum
    {
        return $this->value->greaterThanOrEqual($numeric);
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function lessThan($numeric): BoolEnum
    {
        return $this->value->lessThan($numeric);
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function lessThanOrEqual($numeric): BoolEnum
    {
        return $this->value->lessThanOrEqual($numeric);
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function equalTo($numeric): BoolEnum
    {
        return $this->value->equalTo($numeric);
    }

    /**
     * @api
     *
     * @param int|Numeric $numeric
     */
    public function notEqualTo($numeric): BoolEnum
    {
        return $this->value->notEqualTo($numeric);
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
        return $this->value->between($min, $max);
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
        return $this->value->betweenOrEqual($min, $max);
    }

    public static function fromInt(int $value, int $precision): self
    {
        $numeric = Numeric::fromInt($value, $precision);

        return new self($numeric);
    }

    public static function fromFloat(float $value): self
    {
        $numeric = Numeric::fromFloat($value);

        return new self($numeric);
    }

    /**
     * @api
     */
    public function isZero(): BoolEnum
    {
        return $this->value->isZero();
    }

    /**
     * @api
     */
    public function abs(): self
    {
        $abs = $this->value->abs();

        return new self($abs);
    }
}
