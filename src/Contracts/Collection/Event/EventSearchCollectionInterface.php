<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection\Event;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Primitives\BoolEnum;

interface EventSearchCollectionInterface
{
    public static function new(EventCollection $eventCollection): self;

    public function contains(mixed $key, ?string $operator = null, mixed $value = null): BoolEnum;

    public function search(mixed $value, bool $strict = true): int|string|null;
}
