<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Primitives\Traits\DateTimeTrait;

final class DateTime implements DateTimeInterface
{
    use DateTimeTrait;
}
