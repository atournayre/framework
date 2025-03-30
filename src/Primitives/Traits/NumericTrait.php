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
    private function __construct(
        protected Numeric $value,
    ) {
    }

    /**
     * @throws ThrowableInterface
     */
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
     * @throws ThrowableInterface
     *
     * @api
     */
    public function round(int $mode = PHP_ROUND_HALF_UP): self
    {
        return new self(Numeric::of(1234)->round($mode));
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function greaterThan(float|int|string|Numeric $numeric): BoolEnum
    {
        return $this->value->greaterThan($numeric);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function greaterThanOrEqual(float|int|string|Numeric $numeric): BoolEnum
    {
        return $this->value->greaterThanOrEqual($numeric);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lessThan(float|int|string|Numeric $numeric): BoolEnum
    {
        return $this->value->lessThan($numeric);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lessThanOrEqual(float|int|string|Numeric $numeric): BoolEnum
    {
        return $this->value->lessThanOrEqual($numeric);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function equalTo(float|int|string|Numeric $numeric): BoolEnum
    {
        return $this->value->equalTo($numeric);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function notEqualTo(float|int|string|Numeric $numeric): BoolEnum
    {
        return $this->value->notEqualTo($numeric);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function between(float|int|string $min, float|int|string $max): BoolEnum
    {
        return $this->value->between($min, $max);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function betweenOrEqual(float|int|string $min, float|int|string $max): BoolEnum
    {
        return $this->value->betweenOrEqual($min, $max);
    }

    public static function fromInt(int $value, int $precision): self
    {
        $numeric = Numeric::fromInt($value, $precision);

        return new self($numeric);
    }

    /**
     * @throws ThrowableInterface
     */
    public static function fromFloat(float $value): self
    {
        $numeric = Numeric::fromFloat($value);

        return new self($numeric);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function isZero(): BoolEnum
    {
        return $this->value->isZero();
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function abs(): self
    {
        $abs = $this->value->abs();

        return new self($abs);
    }
}
