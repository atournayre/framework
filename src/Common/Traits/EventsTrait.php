<?php

declare(strict_types=1);

namespace Atournayre\Common\Traits;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Add to constructor:
 * $this->events = EventCollection::empty();
 *
 * When loading an entity, the events collection is not initialized.
 * Add a PostLoadListener to initialize the events collection on postLoad (Doctrine).
 */
trait EventsTrait
{
    protected EventCollection $events;

    /**
     * @throws ThrowableInterface
     */
    public function initializeEvents(): void
    {
        $this->events = EventCollection::empty();
    }

    public function events(): EventCollection
    {
        return $this->events;
    }
}
