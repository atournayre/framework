<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Contracts\Primitives\StringTypeInterface;
use Atournayre\Null\NullTrait;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\StringTypeTrait;

final class EmailSubject implements NullableInterface, StringTypeInterface
{
    use NullTrait;
    use StringTypeTrait;

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function of(string $value): self
    {
        Assert::stringNotEmpty($value, 'Email subject cannot be empty.');

        return new self(StringType::of($value));
    }

    /**
     * @api
     */
    public static function asNull(): self
    {
        return (new self(StringType::of('')))
            ->toNullable()
        ;
    }
}
