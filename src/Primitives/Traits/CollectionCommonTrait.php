<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Exception\RuntimeException;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Int_;

/**
 * @internal
 */
trait CollectionCommonTrait
{
    public function count(): Int_
    {
        return $this->collection
            ->count()
        ;
    }

    /**
     * @return array<int|string, mixed>
     */
    public function toArray(): array
    {
        return $this->collection->toArray();
    }

    /**
     * @throws ThrowableInterface
     */
    public function first(): mixed
    {
        try {
            return $this->collection->first();
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }

    /**
     * @throws ThrowableInterface
     */
    public function firstWithDefault(mixed $default): mixed
    {
        try {
            return $this->collection->first($default);
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }

    /**
     * @throws ThrowableInterface
     */
    public function last(): mixed
    {
        try {
            return $this->collection->last();
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }

    /**
     * @throws ThrowableInterface
     */
    public function lastWithDefault(mixed $default): mixed
    {
        try {
            return $this->collection->last($default);
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }

    /**
     * @param array-key $offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->collection->offsetGet($offset);
    }

    /**
     * @param array-key $offset
     */
    public function offsetUnset($offset): void
    {
        $this->collection->offsetUnset($offset);
    }

    public function atLeastOneElement(): BoolEnum
    {
        return $this->count()
            ->greaterThan(0)
        ;
    }

    public function hasSeveralElements(): BoolEnum
    {
        return $this->count()
            ->greaterThan(1)
        ;
    }

    public function hasNoElement(): BoolEnum
    {
        return $this->count()
            ->equalsTo(0)
        ;
    }

    public function hasOneElement(): BoolEnum
    {
        return $this->count()
            ->equalsTo(1)
        ;
    }

    public function hasXElements(int $int): BoolEnum
    {
        return $this->count()
            ->equalsTo($int)
        ;
    }

    /**
     * @param mixed|null $value
     */
    public function add($value, ?\Closure $callback = null): self
    {
        $clone = clone $this;
        $clone->collection->push($value, $callback);

        return $clone;
    }

    /**
     * @param mixed|null $key
     * @param mixed|null $value
     */
    public function set($key, $value, ?\Closure $callback = null): self
    {
        $clone = clone $this;
        $clone->collection->set($key, $value, $callback);

        return $clone;
    }

    public function map(\Closure $callback): self
    {
        $clone = clone $this;
        $clone->collection = $this->collection->map($callback);

        return $clone;
    }

    public function each(\Closure $callback): self
    {
        $clone = clone $this;
        $clone->collection->each($callback);

        return $clone;
    }

    /**
     * @return array-key[]
     */
    public function keys(): array
    {
        return $this->collection
            ->keys()
        ;
    }
}
