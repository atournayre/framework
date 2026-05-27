<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Int_;

/**
 * @internal
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait CollectionCommonTrait
{
    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function count(): Int_
    {
        return $this->collection
            ->count()
        ;
    }

    /**
     * @return array<int|string, mixed>
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toArray(): array
    {
        return $this->collection->toArray();
    }

    /**
     * @param mixed|null $default
     *
     * @return mixed|null
     *
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function first($default = null)
    {
        try {
            return $this->collection->first($default);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }

    /**
     * @param mixed|null $default
     *
     * @return mixed|null
     *
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function last($default = null)
    {
        try {
            return $this->collection->last($default);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }

    /**
     * @param array-key $offset
     *
     * @return mixed|null
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function offsetGet($offset)
    {
        return $this->collection->offsetGet($offset);
    }

    /**
     * @param array-key $offset
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function offsetUnset($offset): void
    {
        $this->collection->offsetUnset($offset);
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function atLeastOneElement(): BoolEnum
    {
        return $this->count()
            ->greaterThan(0)
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function hasSeveralElements(): BoolEnum
    {
        return $this->count()
            ->greaterThan(1)
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function hasNoElement(): BoolEnum
    {
        return $this->count()
            ->equalsTo(0)
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function hasOneElement(): BoolEnum
    {
        return $this->count()
            ->equalsTo(1)
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function hasXElements(int $int): BoolEnum
    {
        return $this->count()
            ->equalsTo($int)
        ;
    }

    /**
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function add($value, ?\Closure $callback = null): self
    {
        $this->ensureMutable('add');

        $clone = clone $this;
        $clone->collection->push($value, $callback);

        return $clone;
    }

    /**
     * @param mixed|null $key
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function set($key, $value, ?\Closure $callback = null): self
    {
        $this->ensureMutable('set');

        $clone = clone $this;
        $clone->collection->set($key, $value, $callback);

        return $clone;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function map(\Closure $callback): self
    {
        $clone = clone $this;
        $clone->collection = $this->collection->map($callback);

        return $clone;
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function each(\Closure $callback): self
    {
        $clone = clone $this;
        $clone->collection->each($callback);

        return $clone;
    }

    /**
     * @return array-key[]
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function keys(): array
    {
        return $this->collection
            ->keys()
        ;
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function ensureMutable(string $operation): void
    {
        if ($this->collection->isReadOnly()->yes()) {
            RuntimeException::new(sprintf('Cannot %s a read-only collection. Use clone to create a mutable copy.', $operation))
                ->throw()
            ;
        }
    }
}
