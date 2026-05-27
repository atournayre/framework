<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\StringType;

trait StringTypeTrait
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    private function __construct(
        protected StringType $value,
    ) {
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public static function of(string $value): self
    {
        return new self(StringType::of($value));
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toString(): string
    {
        return $this->value->toString();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @param string|self $value
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function equalsTo($value): BoolEnum
    {
        $valueToCheck = $value instanceof self ? $value->toString() : $value;

        return $this->value->equalsTo($valueToCheck);
    }
}
