<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection\Event;

use Atournayre\Common\Collection\Event\EventFilterCollection;

interface EventFilterInterface
{
    public function filter(): EventFilterCollection;
}
