<?php

declare(strict_types=1);

namespace Atournayre\Common\VO\Security;

use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Null\NullTrait;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\StringTypeTrait;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class PlainPassword implements NullableInterface
{
    use StringTypeTrait;
    use NullTrait;

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function asNull(): self
    {
        return (new self(StringType::of('')))
            ->toNullable()
        ;
    }
}
