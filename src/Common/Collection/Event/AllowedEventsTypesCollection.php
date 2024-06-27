<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Event;

use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\CollectionTrait;

/**
 * @template T
 */
final class AllowedEventsTypesCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    public static function elementType(): string
    {
        return 'string';
    }

    use CollectionTrait;

    public function contains(string $type): BoolEnum
    {
        $contains = $this->toMap()
            ->contains($type)
        ;

        return BoolEnum::fromBool($contains);
    }

    public function toLog(): array
    {
        return $this->values();
    }
}
