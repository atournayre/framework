<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Event;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Collection\Event\EventFilterCollectionInterface;
use Atournayre\Primitives\Collection;

final readonly class EventFilterCollection implements EventFilterCollectionInterface
{
    private function __construct(
        private EventCollection $eventCollection,
    ) {
    }

    public static function new(EventCollection $eventCollection): self
    {
        return new self($eventCollection);
    }

    public function byType(string $type): EventCollection
    {
        $collection = Collection::of($this->eventCollection->toArray());

        $filter = $collection
            ->filter(fn (Event $event) => $event instanceof $type)
        ;

        return EventCollection::asMap($filter->toArray());
    }
}
