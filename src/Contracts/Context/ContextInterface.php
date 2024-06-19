<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Context;

use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Security\UserInterface;

interface ContextInterface
{
    public function user(): UserInterface;

    public function createdAt(): DateTimeInterface;
}
