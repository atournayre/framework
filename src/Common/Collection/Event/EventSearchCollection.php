<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Event;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\Traits\SearchCollectionTrait;
use Atournayre\Contracts\Collection\Event\EventSearchCollectionInterface;

final readonly class EventSearchCollection implements EventSearchCollectionInterface
{
    use SearchCollectionTrait;

    private function __construct(
        private EventCollection $collection,
    ) {
    }

    public static function new(EventCollection $collection): self
    {
        return new self($collection);
    }
}
