<?php

declare(strict_types=1);

namespace Atournayre\Common\Types\File;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\StringTypeTrait;

final class Content
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
