<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Context\HasContextInterface;
use Atournayre\Primitives\Collection\TypedCollection;

/**
 * @template T
 *
 * @extends TypedCollection<T>
 *
 * @method EventCollection set($key, string $value, ?\Closure $callback = null)
 * @method Event[]         values()
 * @method Event           first()
 * @method Event           last()
 */
final class EventCollection extends TypedCollection
{
    protected static string $type = Event::class;

    /**
     * @return self<T>
     */
    public static function empty(): self
    {
        return EventCollection::asMap([]);
    }

    /**
     * @param array<T> $collection
     *
     * @return self<T>
     */
    public static function asList(array $collection): self
    {
        throw new \RuntimeException('Use empty() instead.');
    }

    /**
     * @param array<T> $collection
     *
     * @return self<T>
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, Event::class);

        return new self($collection);
    }

    /**
     * @api
     *
     * @return EventCollection<T>
     */
    public function filterByType(string $type): self
    {
        $events = $this
            ->toMap()
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
     * @param T|Event $value
     *
     * @return EventCollection<T>
     */
    public function add($value, ?\Closure $callback = null): self
    {
        $key = $value->_identifier();

        return parent::set($key, $value, $callback);
    }

    protected function validateElement($value): void
    {
        Assert::implementsInterface($value, HasContextInterface::class, 'All events must implement HasContextInterface');
    }
}
