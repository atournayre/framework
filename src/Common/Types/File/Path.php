<?php

declare(strict_types=1);

namespace Atournayre\Common\Types\File;

use Atournayre\Contracts\Primitives\StringTypeInterface;
use Atournayre\Primitives\Traits\StringTypeTrait;

final class Path implements StringTypeInterface
{
    use StringTypeTrait;
}
