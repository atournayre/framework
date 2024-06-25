<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Event;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\VO\Event;

interface EntityEventDispatcherInterface
{
    /**
     * @param EventCollection<Event> $eventCollection
     */
    public function dispatch(EventCollection $eventCollection, ?string $type = null): void;
}
