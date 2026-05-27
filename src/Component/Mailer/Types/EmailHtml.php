<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Null\NullTrait;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\StringTypeTrait;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class EmailHtml implements NullableInterface
{
    use NullTrait;
    use StringTypeTrait;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function of(string $value): self
    {
        Assert::stringNotEmpty($value, 'Email HTML cannot be empty.');

        return new self(StringType::of($value));
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function asNull(): self
    {
        return (new self(StringType::of('')))
            ->toNullable()
        ;
    }
}
