<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Context;

use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Contracts\Security\UserInterface;

interface ContextInterface extends NullableInterface
{
    public function user(): UserInterface;

    public function createdAt(): DateTimeInterface;

    /**
     * @return array<string, mixed>
     */
    public function toLog(): array;
}
