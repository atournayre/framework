<?php

declare(strict_types=1);

namespace Atournayre\Common\Types;

use Atournayre\Contracts\Primitives\StringTypeInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\StringTypeTrait;

/**
 * Represents a text template path.
 */
final class TextTemplatePath implements StringTypeInterface
{
    use StringTypeTrait;

    public static function empty(): self
    {
        return new self(StringType::of(''));
    }

    public function isEmpty(): BoolEnum
    {
        return $this->value->equalsTo('');
    }
}
