<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Event;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Contracts\Collection\Event\EventSearchCollectionInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;

final readonly class EventSearchCollection implements EventSearchCollectionInterface
{
    private function __construct(
        private EventCollection $eventCollection,
    ) {
    }

    public static function new(EventCollection $eventCollection): self
    {
        return new self($eventCollection);
    }

    /**
     * @api
     */
    public function contains(mixed $key, ?string $operator = null, mixed $value = null): BoolEnum
    {
        return Collection::of($this->eventCollection->toArray())
            ->contains($key, $operator, $value)
        ;
    }

    /**
     * @api
     */
    public function search(mixed $value, bool $strict = true): int|string|null
    {
        return Collection::of($this->eventCollection->toArray())
            ->search($value, $strict)
        ;
    }
}
