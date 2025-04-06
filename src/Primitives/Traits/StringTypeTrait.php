<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\StringType;

trait StringTypeTrait
{
    private function __construct(
        protected StringType $value,
    )
    {
    }

    public static function of(string $value): self
    {
        return new self(StringType::of($value));
    }

    public function toString(): string
    {
        return $this->value->toString();
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @param string|self $value
     */
    public function equalsTo($value): BoolEnum
    {
        $valueToCheck = $value instanceof self ? $value->toString() : $value;

        return $this->value->equalsTo($valueToCheck);
    }
}
