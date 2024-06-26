<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Dispatcher;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Event\EntityEventDispatcherInterface;
use Atournayre\Contracts\Log\LoggerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;

final class EntityEventDispatcher implements EntityEventDispatcherInterface
{
    private EventDispatcherInterface $eventDispatcher;

    private LoggerInterface $logger;

    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @throws \Exception
     */
    public function dispatch(EventCollection $eventCollection, ?string $type = null): void
    {
        if (null === $type) {
            $this->dispatchAllEvents($eventCollection);

            return;
        }

        $this->dispatchEventsByType($eventCollection, $type);
    }

    private function dispatchAllEvents(EventCollection $eventCollection): void
    {
        $eventCollection
            ->each(fn (Event $event) => $this->dispatchEvent($event))
        ;
    }

    private function dispatchEvent(Event $event): void
    {
        $this->logger->info(sprintf('Dispatching %s event', $event->_type()), $event->toLog());

        $this->eventDispatcher->dispatch($event);

        $this->logger->info(sprintf('Event %s dispatched', $event->_type()), $event->toLog());
    }

    /**
     * @throws \Exception
     */
    private function dispatchEventsByType(EventCollection $eventCollection, string $type): void
    {
        $eventCollection
            ->filterByType($type)
            ->each(fn (Event $event) => $this->dispatchEvent($event))
        ;
    }
}
