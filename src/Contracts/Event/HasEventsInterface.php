<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Event;

use Atournayre\Common\Collection\Event\AllowedEventsTypesCollection;
use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\VO\Event;

interface HasEventsInterface
{
    public function initializeEvents(): void;

    public function events(): EventCollection;

    public function filterEventsByType(string $type): EventCollection;

    public function addEvent(Event $event): void;

    public function setEvent(string $index, Event $event): void;

    public function removeEvent(Event $event): void;

    public function allowedEventsTypes(): AllowedEventsTypesCollection;
}
