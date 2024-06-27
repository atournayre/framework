<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Event;

use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\CollectionTrait;

/**
 * @template T
 * @template TKey of int
 * @template TValue of string
 *
 * @implements CollectionInterface<TKey, TValue>
 * @implements \ArrayAccess<TKey, TValue>
 */
final class AllowedEventsTypesCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    public static function elementType(): string
    {
        return 'string';
    }

    public function contains(string $type): BoolEnum
    {
        $contains = $this->toMap()
            ->contains($type)
        ;

        return BoolEnum::fromBool($contains);
    }

    /**
     * @return array<string>
     */
    public function toLog(): array
    {
        return $this->values();
    }
}
