<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Primitives\Traits\StringTypeTrait;

/**
 * Represents an e-mail username (before the @ symbol in an e-mail address).
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class EmailUserName
{
    use StringTypeTrait;
}
