<?php

declare(strict_types=1);

namespace Atournayre\Common\Types;

use Atournayre\Contracts\Primitives\StringTypeInterface;
use Atournayre\Primitives\Traits\StringTypeTrait;

/**
 * Represents a domain (e.g. "example.com").
 */
final class Domain implements StringTypeInterface
{
    use StringTypeTrait;
}
