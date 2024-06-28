<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Common\VO\Event;
use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Context\HasContextInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\CollectionTrait;

final class EventCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    public static function elementType(): string
    {
        return Event::class;
    }

    public static function empty(): self
    {
        return EventCollection::asMap([]);
    }

    public static function asList($elements = []): self
    {
        throw new \RuntimeException('Use empty() instead.');
    }

    /**
     * @api
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
     * @param bool|BoolEnum|callable|null $condition
     */
    public function add($value, $condition = null): self
    {
        $key = $value->_identifier();

        return $this
            ->set($key, $value, $condition)
        ;
    }

    protected function validateElement($value): void
    {
        Assert::implementsInterface($value, HasContextInterface::class, 'All events must implement HasContextInterface');
    }

    /**
     * @return array<string, array>
     */
    public function toLog(): array
    {
        return $this->toMap()
            ->map(static fn (Event $event): array => $event->toLog())
            ->toArray()
        ;
    }
}
