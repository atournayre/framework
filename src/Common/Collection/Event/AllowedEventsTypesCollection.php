<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Event;

use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Contracts\Log\LoggableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\CollectionTrait;

final class AllowedEventsTypesCollection implements \Countable, \ArrayAccess, CollectionInterface, LoggableInterface
{
    use CollectionTrait;

    public static function elementType(): string
    {
        return 'string';
    }

    /**
     * @api
     */
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
