<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Common\VO\Event;
use Atournayre\Primitives\Collection\CollectionTrait;
use Atournayre\Primitives\Collection\MapTrait;

final class EventCollection
{
    use CollectionTrait;
    use MapTrait;

    protected static string $type = Event::class;

    /**
     * @api
     */
    public static function empty(): self
    {
        return EventCollection::asMap([]);
    }

    /**
     * @api
     */
    public function filterByType(string $type): self
    {
        $clone = clone $this;
        $events = $clone
            ->collection
            ->filter(static fn (Event $event): bool => $event instanceof $type)
            ->toArray()
        ;

        $eventCollection = EventCollection::empty();
        foreach ($events as $event) {
            $eventCollection = $eventCollection->add($event);
        }

        return $eventCollection;
    }

    /**
     * @api
     *
     * @param mixed|null $value
     *
     * @throws \Exception
     */
    public function add($value, ?\Closure $callback = null): self
    {
        $key = $value->_identifier();

        return $this->set($key, $value, $callback);
    }
}
