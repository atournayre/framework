<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Common\Assert\Assert;
use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Null\NullTrait;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\StringTypeTrait;

final class EmailSubject implements NullableInterface
{
    use NullTrait;
    use StringTypeTrait;

    /**
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
