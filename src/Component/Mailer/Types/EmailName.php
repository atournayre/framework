<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Contracts\Primitives\StringTypeInterface;
use Atournayre\Primitives\Traits\StringTypeTrait;

/**
 * Represents an e-mail name (the name of the person sending or receiving the e-mail).
 */
final class EmailName implements StringTypeInterface
{
    use StringTypeTrait;
}
