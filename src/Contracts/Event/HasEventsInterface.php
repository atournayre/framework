<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Event;

use Atournayre\Common\Collection\EventCollection;

interface HasEventsInterface
{
    public function initializeEvents(): void;

    public function events(): EventCollection;
}
