<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Null\NullTrait;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\StringTypeTrait;

final class EmailText implements NullableInterface
{
    use NullTrait;
    use StringTypeTrait;

    /**
     * @throws ThrowableInterface
     */
    public static function of(string $value): self
    {
        Assert::stringNotEmpty($value, 'Email text cannot be empty.');

        return new self(StringType::of($value));
    }

    public static function asNull(): self
    {
        return (new self(StringType::of('')))
            ->toNullable()
        ;
    }
}
