<?php

declare(strict_types=1);

namespace Atournayre\Common\Types\File;

use Atournayre\Contracts\Primitives\StringTypeInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Traits\StringTypeTrait;

final class Content implements StringTypeInterface
{
    use StringTypeTrait;

    /**
     * @api
     */
    public function containsAny(string $needle): BoolEnum
    {
        return $this->value->containsAny($needle);
    }
}
