<?php

declare(strict_types=1);

namespace Atournayre\Common\Collection\Event;

use Atournayre\Common\Assert\Assert;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection\TypedCollection;

/**
 * @template T
 *
 * @extends TypedCollection<T>
 *
 * @method AllowedEventsTypesCollection add(string $value, ?\Closure $callback = null)
 * @method AllowedEventsTypesCollection set($key, string $value, ?\Closure $callback = null)
 * @method string[]                     values()
 * @method string                       first()
 * @method string                       last()
 */
final class AllowedEventsTypesCollection extends TypedCollection
{
    /**
     * @param array<T> $collection
     *
     * @return AllowedEventsTypesCollection<T>
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, TypedCollection::$type);

        return new self($collection);
    }

    public function contains(string $type): BoolEnum
    {
        return $this->toMap()
            ->contains($type)
        ;
    }
}
