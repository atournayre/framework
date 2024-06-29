<?php

declare(strict_types=1);

namespace Atournayre\Wrapper;

use Aimeos\Map as AimeosMap;
use Atournayre\Contracts\Collection\CollectionInterface;
use Atournayre\Primitives\BoolEnum;

final class Collection implements CollectionInterface
{
    private AimeosMap $map;

    private function __construct(AimeosMap $map)
    {
        $this->map = $map;
    }

    /**
     * @api
     * @template T
     * @param array<int|string, T> $elements
     * @return self<int|string, T>
     */
    public static function of(array $elements = []): self
    {
        $map = AimeosMap::from($elements);

        return new self($map);
    }

    /**
     * @api
     *
     * @param int|string $key
     * @param mixed|null $default
     *
     * @throws \Throwable
     */
    // @phpstan-ignore-next-line Remove when upgrading to PHP 8
    public function get($key, $default = null)
    {
        return $this->map->get($key, $default);
    }

    /**
     * @api
     *
     * @param int|string $key
     *
     * @return self<int|string, mixed>
     */
    // @phpstan-ignore-next-line Remove when upgrading to PHP 8
    public function set($key, $value): self
    {
        $this->map->set($key, $value);

        return $this;
    }

    /**
     * @api
     *
     * @param array<int|string>|int|string $key
     */
    public function has($key): BoolEnum
    {
        $has = $this->map->has($key);

        return BoolEnum::fromBool($has);
    }

    /**
     * @api
     *
     * @param iterable<int|string>|array<int|string>|int|string $keys
     *
     * @return self<int|string, mixed>
     */
    public function remove($keys): self
    {
        $this->map->remove($keys);

        return $this;
    }

    /**
     * @api
     *
     * @return self<int|string, mixed>
     */
    public function each(\Closure $callback): self
    {
        $this->map->each($callback);

        return $this;
    }

    /**
     * @api
     *
     * @return array<int|string, mixed>
     */
    public function toArray(): array
    {
        return $this->map->toArray();
    }

    /**
     * @api
     *
     * @return self<int|string, mixed>
     */
    public function map(callable $callback): self
    {
        $map = $this->map->map($callback);

        return new self($map);
    }

    /**
     * @api
     */
    public function sum(): float
    {
        return $this->map->sum();
    }

    /**
     * @api
     */
    public function avg(): float
    {
        return $this->map->avg();
    }

    /**
     * @api
     */
    public function min(): float
    {
        return $this->map->min();
    }

    /**
     * @api
     */
    public function max(): float
    {
        return $this->map->max();
    }

    /**
     * @api
     */
    // @phpstan-ignore-next-line Remove when upgrading to PHP 8
    public function firstKey()
    {
        return $this->map->firstKey();
    }

    /**
     * @api
     *
     * @param mixed|null $default
     *
     * @throws \Throwable
     */
    // @phpstan-ignore-next-line Remove when upgrading to PHP 8
    public function first($default = null)
    {
        return $this->map->first($default);
    }

    /**
     * @api
     *
     * @param mixed|null $default
     *
     * @throws \Throwable
     */
    // @phpstan-ignore-next-line Remove when upgrading to PHP 8
    public function last($default = null)
    {
        return $this->map->last($default);
    }

    /**
     * @api
     */
    public function contains(string $type): BoolEnum
    {
        $contains = $this->map->contains($type);

        return BoolEnum::fromBool($contains);
    }

    /**
     * @api
     *
     * @return self<int|string, mixed>
     */
    public function filter(?callable $callback = null): self
    {
        $map = $this->map->filter($callback);

        return new self($map);
    }

    /**
     * @api
     *
     * @return self<int|string, mixed>
     */
    public function values(): self
    {
        $values = $this->map->values();

        return new self($values);
    }

    /**
     * @api
     *
     * @return self<int|string, mixed>
     */
    public function usort(callable $callback): self
    {
        $this->map->usort($callback);

        return $this;
    }

    /**
     * @api
     *
     * @param bool $strict
     *
     * @return int|string|null
     */
    // @phpstan-ignore-next-line Remove when upgrading to PHP 8
    public function search($value, $strict = true)
    {
        return $this->map->search($value, $strict);
    }

    /**
     * @api
     */
    public function count(): int
    {
        return $this->map->count();
    }

    /**
     * @api
     *
     * @return \ArrayIterator<int|string, mixed>
     */
    public function getIterator(): \ArrayIterator
    {
        return $this->map->getIterator();
    }

    /**
     * @api
     *
     * @param int|string $offset
     */
    public function offsetExists($offset): bool
    {
        return $this->map->offsetExists($offset);
    }

    /**
     * @api
     *
     * @param int|string $offset
     */
    public function offsetGet($offset)
    {
        return $this->map->offsetGet($offset);
    }

    /**
     * @api
     *
     * @param int|string|null $offset
     */
    public function offsetSet($offset, $value): void
    {
        $this->map->offsetSet($offset, $value);
    }

    /**
     * @api
     *
     * @param int|string $offset
     */
    public function offsetUnset($offset): void
    {
        $this->map->offsetUnset($offset);
    }

    /**
     * @api
     *
     * @return array<int|string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->map->jsonSerialize();
    }
}
