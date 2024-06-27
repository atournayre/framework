<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;

class TypedCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    public static function elementType(): string
    {
        return 'string';
    }

    use CollectionTrait;

    public function toLog(): array
    {
        return $this->toArray();
    }
}
