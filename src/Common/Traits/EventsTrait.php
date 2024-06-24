<?php

declare(strict_types=1);

namespace Atournayre\Common\Traits;

use Atournayre\Common\Collection\Event\AllowedEventsTypesCollection;
use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\VO\Event;

/**
 * Add to constructor:
 * $this->events = EventCollection::empty();
 */
trait EventsTrait
{
    /**
     * @var EventCollection<Event>
     */
    private EventCollection $events;

    /**
     * @return EventCollection<Event>
     */
    public function events(): EventCollection
    {
        return $this->events;
    }

    /**
     * @throws \Exception
     */
    public function addEvent(Event $event): void
    {
        $this->setEvent($event->_identifier(), $event);
    }

    /**
     * @throws \Exception
     */
    public function setEvent(string $index, Event $event): void
    {
        // @phpstan-ignore-next-line
        if (false === method_exists($this, 'allowedEventsTypes')) {
            throw new \RuntimeException('You must implement the method "allowedEventsTypes" to use this trait');
        }

        /** @var AllowedEventsTypesCollection<string> $allowedEventsTypes */
        $allowedEventsTypes = $this->allowedEventsTypes();

        $eventType = $event->_type();
        if ($allowedEventsTypes->contains($eventType)->isFalse()) {
            throw new \RuntimeException(sprintf('Event type "%s" is not allowed for this object', $eventType));
        }

        $this->events[$index] = $event;
    }

    public function removeEvent(Event $event): void
    {
        $index = $this->events
            ->toMap()
            ->search($event)
        ;

        if (null === $index) {
            return;
        }

        $this->events
            ->offsetUnset($index)
        ;
    }

    /**
     * @return EventCollection<Event>
     */
    public function filterEventsByType(string $type): EventCollection
    {
        return $this->events
            ->filterByType($type)
        ;
    }
}
