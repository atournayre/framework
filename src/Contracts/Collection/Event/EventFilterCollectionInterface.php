<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection\Event;

use Atournayre\Common\Collection\EventCollection;

interface EventFilterCollectionInterface
{
    public static function new(EventCollection $eventCollection): self;

    public function byType(string $type): EventCollection;
}
