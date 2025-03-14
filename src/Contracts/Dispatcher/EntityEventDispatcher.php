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
    public function __construct(
        private readonly EventDispatcherInterface $eventDispatcher,
        private readonly LoggerInterface $logger,
    ) {
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
            ->each(
                function (Event $event) use ($eventCollection): void {
                    $this->dispatchEvent($event);
                    $eventCollection->remove($event);
                },
            )
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
        $eventCollection = $eventCollection->filterByType($type);

        $this->dispatchAllEvents($eventCollection);
    }
}
