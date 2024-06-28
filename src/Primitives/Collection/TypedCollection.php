<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;

/**
 * @implements \ArrayAccess<int|string, string>
 */
class TypedCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    public static function elementType(): string
    {
        return 'string';
    }

    /**
     * @return array<string>
     */
    public function toLog(): array
    {
        return $this->toArray();
    }
}
