<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Contracts\Collection\AsMapInterface;
use Atournayre\Common\Assert\Assert;
use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\CollectionTrait;

final class EventCollection implements AsMapInterface
{
    use CollectionTrait;

    /**
     * @param array<string, Event|mixed> $collection
     *
     * @throws ThrowableInterface
     */
    public static function asMap(array $collection = []): self
    {
        Assert::isMapOf($collection, Event::class);

        return new self(Collection::of($collection));
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public static function empty(): self
    {
        return EventCollection::asMap([]);
    }

    /**
     * @throws ThrowableInterface
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
     * @throws ThrowableInterface
     *
     * @api
     */
    public function add(mixed $value, ?\Closure $callback = null): self
    {
        $key = $value->_identifier();
        $this->set($key, $value, $callback);

        return $this;
    }

    /**
     * @api
     */
    public function contains(mixed $key, ?string $operator = null, mixed $value = null): BoolEnum
    {
        return $this
            ->collection
            ->contains($key, $operator, $value)
        ;
    }

    /**
     * @api
     */
    public function search(mixed $value, bool $strict = true): int|string|null
    {
        return $this
            ->collection
            ->search($value, $strict)
        ;
    }

    /**
     * @api
     */
    public function remove(Event $event): void
    {
        $index = $this
            ->collection
            ->search($event)
        ;

        if (null === $index) {
            return;
        }

        $this
            ->collection
            ->offsetUnset($index)
        ;
    }
}
