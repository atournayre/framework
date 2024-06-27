<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Event;

use Atournayre\Common\Collection\Event\AllowedEventsTypesCollection;
use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\VO\Event;

/**
 * @template Event of \Atournayre\Common\VO\Event
 */
interface HasEventsInterface
{
    /**
     * @return EventCollection<Event>
     */
    public function events(): EventCollection;

    /**
     * @return EventCollection<Event>
     */
    public function filterEventsByType(string $type): EventCollection;

    public function addEvent(Event $event): void;

    public function setEvent(string $index, Event $event): void;

    public function removeEvent(Event $event): void;

    /**
     * @return AllowedEventsTypesCollection<string>
     */
    public function allowedEventsTypes(): AllowedEventsTypesCollection;
}
