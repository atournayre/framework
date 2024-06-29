<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Collection\MapInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\CollectionTrait;

final class EventCollection implements MapInterface
{
    use CollectionTrait;

    /**
     * @param array<string, Event|mixed> $collection
     */
    public static function asMap(array $collection = []): self
    {
        Assert::isMapOf($collection, Event::class);

        return new self(Collection::of($collection));
    }

    /**
     * @api
     */
    public static function empty(): self
    {
        return EventCollection::asMap([]);
    }

    /**
     * @throws \Exception
     *
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
        $this->set($key, $value, $callback);

        return $this;
    }

    /**
     * @api
     *
     * @param mixed|null $key
     * @param mixed|null $value
     */
    public function contains($key, ?string $operator = null, $value = null): BoolEnum
    {
        return $this->collection
            ->contains($key, $operator, $value)
        ;
    }

    /**
     * @param mixed|null $value
     * @param bool $strict
     * @return int|string|null
     */
    public function search($value, $strict = true)
    {
        return $this->collection
            ->search($value, $strict)
        ;
    }
}
