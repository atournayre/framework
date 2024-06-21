<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

trait StringTypeTrait
{
    protected StringType $value;

    private function __construct(StringType $value)
    {
        $this->value = $value;
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
}
