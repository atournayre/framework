<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;

class TypedCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    public static function elementType(): string
    {
        return 'string';
    }

    public function toLog(): array
    {
        return $this->toArray();
    }
}
