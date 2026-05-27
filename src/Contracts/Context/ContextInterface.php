<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Context;

use Atournayre\Contracts\DateTime\DateTimeInterface;
use Atournayre\Contracts\Null\NullableInterface;
use Atournayre\Contracts\Security\UserInterface;

interface ContextInterface extends NullableInterface
{
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function user(): UserInterface;

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function createdAt(): DateTimeInterface;

    /**
     * @return array<string, mixed>
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toLog(): array;
}
