<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection\Event;

use Atournayre\Common\Collection\Event\EventSearchCollection;

interface EventSearchInterface
{
    public function search(): EventSearchCollection;
}
