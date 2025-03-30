<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection\Event;

use Atournayre\Common\Collection\EventCollection;
use Atournayre\Contracts\Collection\CollectionSearchInterface;

interface EventSearchCollectionInterface extends CollectionSearchInterface
{
    public static function new(EventCollection $collection): self;
}
