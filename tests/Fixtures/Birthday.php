<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures;

use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Primitives\Traits\DateTimeTrait;

final class Birthday implements DateTimeInterface
{
    use DateTimeTrait;
}
