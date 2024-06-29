<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Event;

use Atournayre\Primitives\Collection\CollectionTrait;
use Atournayre\Primitives\Collection\ListTrait;

final class AllowedEventsTypesCollection
{
    use CollectionTrait;
    use ListTrait;

    protected static string $type = 'string';
}
