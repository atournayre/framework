<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Event;

use Atournayre\Common\Collection\EventCollection;

interface EntityEventDispatcherInterface
{
    public function dispatch(EventCollection $eventCollection, ?string $type = null): void;
}
