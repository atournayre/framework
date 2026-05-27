<?php

declare(strict_types=1);

namespace Atournayre\Common\Types;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\StringTypeTrait;

/**
 * Represents an HTML template path.
 */
final class HtmlTemplatePath
{
    use StringTypeTrait;

    public static function empty(): self
    {
        return new self(StringType::of(''));
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isEmpty(): BoolEnum
    {
        return $this->value->equalsTo('');
    }
}
