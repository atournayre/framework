<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Wrapper\Map;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @template T
 *
 * @extends AbstractCollection<T>
 */
class TypedCollection extends AbstractCollection
{
    protected static string $type = 'string';

    /**
     * @api
     *
     * @param array<int, T> $collection
     *
     * @return self<T>
     */
    public static function asList(array $collection): self
    {
        Assert::isListOf($collection, static::$type);

        // @phpstan-ignore-next-line
        return new static($collection);
    }

    /**
     * @api
     *
     * @param array<string, T> $collection
     *
     * @return self<T>
     */
    public static function asMap(array $collection): self
    {
        Assert::isMapOf($collection, static::$type);

        // @phpstan-ignore-next-line
        return new static($collection);
    }

    /**
     * @api
     *
     * @param ArrayCollection<array-key, T> $collection
     */
    public static function fromArrayCollectionToMap(ArrayCollection $collection): Map
    {
        $firstKey = $collection->key();

        if (is_string($firstKey)) {
            return self::asMap($collection->toArray())
                ->toMap()
            ;
        }

        return self::asList($collection->toArray())
            ->toMap()
        ;
    }

    /**
     * @api
     *
     * @param Map<int|string, T> $collection
     *
     * @return ArrayCollection<int|string, T>
     */
    public static function fromMapToArrayCollection(Map $collection): ArrayCollection
    {
        $firstKey = $collection->firstKey();

        if (is_string($firstKey)) {
            return self::asMap($collection->toArray())
                ->toArrayCollection()
            ;
        }

        return self::asList($collection->toArray())
            ->toArrayCollection()
        ;
    }

    /**
     * @api
     *
     * @param Map<int|string, T> $map
     *
     * @return self<T>
     */
    public static function fromMapAsMap(Map $map): self
    {
        return self::asMap($map->toArray());
    }

    /**
     * @api
     */
    public function isMap(): bool
    {
        return is_string($this->firstKey());
    }

    /**
     * @api
     *
     * @return int|string
     */
    public function firstKey()
    {
        return $this->toArrayCollection()->key();
    }

    /**
     * @api
     *
     * @return array<int|string>
     */
    public function getKeys(): array
    {
        return $this->toArrayCollection()->getKeys();
    }

    /**
     * @api
     */
    public function isList(): bool
    {
        return is_int($this->firstKey());
    }

    /**
     * @api
     *
     * @param Map<int|string, T> $map
     *
     * @return self<T>
     */
    public static function fromMapAsList(Map $map): self
    {
        return self::asList($map->toArray());
    }
}
