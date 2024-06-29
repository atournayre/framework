<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Common\Assert\Assert;
use Atournayre\Wrapper\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @template T
 *
 * @implements \ArrayAccess<int|string, T>
 */
abstract class AbstractCollection implements \ArrayAccess, \Countable
{
    /**
     * @var array<T>
     */
    protected array $collection = [];

    /**
     * @param array<int|string, T> $collection
     */
    protected function __construct(
        array $collection = []
    ) {
        $this->collection = $collection;
        foreach ($this->collection as $value) {
            $this->validateElement($value);
        }

        $this->validate();
    }

    /**
     * @api
     *
     * @param array<int, T> $collection
     *
     * @return static<T>
     */
    abstract public static function asList(array $collection): AbstractCollection;

    /**
     * @api
     *
     * @param array<string, T> $collection
     *
     * @return static<T>
     */
    abstract public static function asMap(array $collection): AbstractCollection;

    /**
     * @api
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->collection);
    }

    /**
     * @api
     *
     * @param string|int $offset
     *
     * @return T
     */
    public function offsetGet($offset)
    {
        return $this->collection[$offset];
    }

    /**
     * @param string|int $offset
     * @param T          $value
     */
    protected function offsetSetAssertion($offset, $value): void
    {
        if ($this->hasNoElement()) {
            return;
        }

        if (is_string($offset)) {
            Assert::isMap($this->collection, 'Adding element to collection (list) using string key is not supported.');
        }

        if (is_int($offset)) {
            Assert::isList($this->collection, 'Adding element to collection (map) using integer key is not supported.');
        }

        $firstElement = $this->first();

        if (\is_object($firstElement)) {
            Assert::isInstanceOf($value, \get_class($firstElement));

            return;
        }

        Assert::isType($value, \gettype($firstElement));
    }

    /**
     * @api
     */
    public function offsetSet($offset, $value): void
    {
        $this->offsetSetAssertion($offset, $value);
        $this->collection[$offset] = $value;
    }

    /**
     * @api
     *
     * @param T             $value
     * @param \Closure|null $callback If the callback returns false, the value is not added
     *
     * @return static<T>
     */
    public function add($value, ?\Closure $callback = null): self
    {
        if ($callback instanceof \Closure && !$callback($value)) {
            // @phpstan-ignore-next-line
            return new static($this->collection);
        }

        $values = $this->collection;
        $values[] = $value;

        // @phpstan-ignore-next-line
        return new static($values);
    }

    /**
     * @api
     *
     * @param array-key     $key
     * @param T             $value
     * @param \Closure|null $callback If the callback returns false, the value is not added
     *
     * @return static<T>
     */
    public function set($key, $value, ?\Closure $callback = null): self
    {
        if ($callback instanceof \Closure && !$callback($key, $value)) {
            // @phpstan-ignore-next-line
            return new static($this->collection);
        }

        $values = $this->collection;
        $values[$key] = $value;

        // @phpstan-ignore-next-line
        return new static($values);
    }

    /**
     * @api
     */
    public function offsetUnset($offset): void
    {
        unset($this->collection[$offset]);
    }

    /**
     * @api
     */
    public function count(): int
    {
        return count($this->collection);
    }

    /**
     * @api
     *
     * @return array<T>
     */
    public function values(): array
    {
        return $this->collection;
    }

    /**
     * @api
     *
     * @return ArrayCollection<int|string, T>
     */
    public function toArrayCollection(): ArrayCollection
    {
        return new ArrayCollection($this->collection);
    }

    /**
     * @api
     */
    public function toMap(): Collection
    {
        return Collection::of($this->collection);
    }

    /**
     * @api
     */
    public function atLeastOneElement(): bool
    {
        return $this->count() > 0;
    }

    /**
     * @api
     */
    public function hasSeveralElements(): bool
    {
        return $this->count() > 1;
    }

    /**
     * @api
     */
    public function hasOneElement(): bool
    {
        return $this->hasXElements(1);
    }

    /**
     * @api
     */
    public function hasNoElement(): bool
    {
        return $this->hasXElements(0);
    }

    /**
     * @api
     */
    public function hasXElements(int $x): bool
    {
        return $this->count() === $x;
    }

    /**
     * @api
     *
     * @param T $value
     */
    protected function validateElement($value): void
    {
        // Override this method in child class to add validation
    }

    /**
     * @api
     */
    protected function validate(): void
    {
        // Override this method in child class to add validation
    }

    /**
     * @api
     *
     * @return T
     */
    public function first()
    {
        return reset($this->collection);
    }

    /**
     * @api
     *
     * @return T
     */
    public function last()
    {
        return end($this->collection);
    }

    /**
     * @api
     *
     * @return T
     */
    public function current()
    {
        return current($this->collection);
    }
}
