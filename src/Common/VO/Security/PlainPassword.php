<?php

declare(strict_types=1);

namespace Atournayre\Common\VO\Security;

use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Null\NullTrait;
use Atournayre\Primitives\Enum\StringTypeTrait;

final class PlainPassword implements NullableInterface
{
    use StringTypeTrait;
    use NullTrait;
}
