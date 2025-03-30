<?php

declare(strict_types=1);

namespace Atournayre\Common\VO\Security;

use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Contracts\Primitives\StringTypeInterface;
use Atournayre\Null\NullTrait;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\StringTypeTrait;

final class PlainPassword implements NullableInterface, StringTypeInterface
{
    use StringTypeTrait;
    use NullTrait;

    public static function asNull(): self
    {
        return (new self(StringType::of('')))
            ->toNullable()
        ;
    }
}
