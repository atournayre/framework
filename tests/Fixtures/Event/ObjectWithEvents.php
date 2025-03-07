<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures\Event;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Common\Traits\EventsTrait;
use Atournayre\Contracts\Event\HasEventsInterface;

final class ObjectWithEvents implements HasEventsInterface
{
    use EventsTrait;

    public function __construct()
    {
        $this->events = EventCollection::empty();
    }
}
