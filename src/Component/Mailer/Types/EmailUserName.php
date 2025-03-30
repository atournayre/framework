<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Contracts\Primitives\StringTypeInterface;
use Atournayre\Primitives\Traits\StringTypeTrait;

/**
 * Represents an e-mail username (before the @ symbol in an e-mail address).
 */
final class EmailUserName implements StringTypeInterface
{
    use StringTypeTrait;
}
