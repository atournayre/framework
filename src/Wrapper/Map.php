<?php

declare(strict_types=1);

namespace Atournayre\Wrapper;

use Aimeos\Map as AimeosMap;
use Atournayre\Primitives\BoolEnum;

final class Map
{
    private AimeosMap $map;

    public function __construct(AimeosMap $map)
    {
        $this->map = $map;
    }

    public static function from($elements = []): self
    {
        $map = AimeosMap::from($elements);

        return new self($map);
    }

    /**
     * @throws \Throwable
     */
    public function get($key, $default = null)
    {
        return $this->map->get($key, $default);
    }

    public function set($key, $value): self
    {
        $this->map->set($key, $value);

        return $this;
    }

    public function has($key): BoolEnum
    {
        $has = $this->map->has($key);

        return BoolEnum::fromBool($has);
    }

    public function remove($key): self
    {
        $this->map->remove($key);

        return $this;
    }

    public function each(\Closure $callback): self
    {
        $this->map->each($callback);

        return $this;
    }

    public function toArray(): array
    {
        return $this->map->toArray();
    }

    public function map(\Closure $callback): self
    {
        $map = $this->map->map($callback);

        return new self($map);
    }

    public function sum(): float
    {
        return $this->map->sum();
    }

    public function avg(): float
    {
        return $this->map->avg();
    }

    public function min(): float
    {
        return $this->map->min();
    }

    public function max(): float
    {
        return $this->map->max();
    }

    public function firstKey()
    {
        return $this->map->firstKey();
    }

    /**
     * @api
     *
     * @throws \Throwable
     */
    public function first()
    {
        return $this->map->first();
    }

    /**
     * @api
     */
    public function contains(string $type): BoolEnum
    {
        $contains = $this->map->contains($type);

        return BoolEnum::fromBool($contains);
    }

    public function filter(\Closure $callback): self
    {
        $map = $this->map->filter($callback);

        return new self($map);
    }

    public function values(): self
    {
        $values = $this->map->values();

        return new self($values);
    }

    public function usort(\Closure $callback): self
    {
        $this->map->usort($callback);

        return $this;
    }

    public function search($value, $strict = true)
    {
        return $this->map->search($value, $strict);
    }

    public function count(): int
    {
        return $this->map->count();
    }
}
