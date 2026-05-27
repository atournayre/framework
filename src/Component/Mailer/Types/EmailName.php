<?php

declare(strict_types=1);

namespace Atournayre\Component\Mailer\Types;

use Atournayre\Primitives\Traits\StringTypeTrait;

/**
 * Represents an e-mail name (the name of the person sending or receiving the e-mail).
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class EmailName
{
    use StringTypeTrait;
}
