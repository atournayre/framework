<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Contracts\Exception\ThrowableInterface;
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
     *@throws ThrowableInterface
     * @api
     */
    public function format(Locale $locale): string
    {
        return $this->value->format($locale);
    }

    /**
     * @throws ThrowableInterface
     * @api
     */
    public function round(int $mode = PHP_ROUND_HALF_UP): self
    {
        return new self($this->value->round($mode));
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     * @api
     *
     */
    public function greaterThan($numeric): BoolEnum
    {
        return $this->value->greaterThan($numeric);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     * @api
     *
     */
    public function greaterThanOrEqual($numeric): BoolEnum
    {
        return $this->value->greaterThanOrEqual($numeric);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     * @api
     *
     */
    public function lessThan($numeric): BoolEnum
    {
        return $this->value->lessThan($numeric);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     * @api
     *
     */
    public function lessThanOrEqual($numeric): BoolEnum
    {
        return $this->value->lessThanOrEqual($numeric);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     * @api
     *
     */
    public function equalTo($numeric): BoolEnum
    {
        return $this->value->equalTo($numeric);
    }

    /**
     * @param int|Numeric $numeric
     *
     * @throws ThrowableInterface
     * @api
     *
     */
    public function notEqualTo($numeric): BoolEnum
    {
        return $this->value->notEqualTo($numeric);
    }

    /**
     * @param int|Numeric $min
     * @param int|Numeric $max
     *
     * @throws ThrowableInterface
     * @api
     *
     */
    public function between($min, $max): BoolEnum
    {
        return $this->value->between($min, $max);
    }

    /**
     * @param int|Numeric $min
     * @param int|Numeric $max
     *
     * @throws ThrowableInterface
     * @api
     *
     */
    public function betweenOrEqual($min, $max): BoolEnum
    {
        return $this->value->betweenOrEqual($min, $max);
    }

    /**
     * @throws ThrowableInterface
     */
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
     * @api
     */
    public function isZero(): BoolEnum
    {
        return $this->value->isZero();
    }

    /**
     * @throws ThrowableInterface
     * @api
     */
    public function abs(): self
    {
        $abs = $this->value->abs();

        return new self($abs);
    }
}
