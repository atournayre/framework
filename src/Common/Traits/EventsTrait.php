<?php

declare(strict_types=1);

namespace Atournayre\Common\Traits;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Event\HasEventsInterface;

/**
 * Add to constructor:
 * $this->events = EventCollection::empty();
 *
 * Add a PostLoadListener to initialize the events collection on postLoad (Doctrine)
 */
trait EventsTrait
{
    protected EventCollection $events;

    public function initializeEvents(): void
    {
        $this->events = EventCollection::empty();
    }

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
        Assert::implementsInterface($this, HasEventsInterface::class);

        $eventType = $event->_type();
        $eventTypeIsNotAllowed = $this->allowedEventsTypes()
            ->contains($eventType)
            ->isFalse()
        ;

        if ($eventTypeIsNotAllowed) {
            throw new \RuntimeException(sprintf('Event type "%s" is not allowed for this object', $eventType));
        }

        $this->events->set($index, $event);
    }

    public function removeEvent(Event $event): void
    {
        $index = $this->events
            ->search($event)
        ;

        if (null === $index) {
            return;
        }

        $this->events
            ->offsetUnset($index)
        ;
    }

    public function filterEventsByType(string $type): EventCollection
    {
        return $this->events
            ->filterByType($type)
            ;
    }
}
