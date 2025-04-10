<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection;

trait AddCollectionTrait
{
    /**
     * Adds all elements with new keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function concat($elements): self
    {
        $this->ensureMutable('concat');

        $elements = $this->convertElementsToArray($elements);

        $concat = $this->collection
            ->concat($elements)
        ;

        return self::of($concat);
    }

    /**
     * Inserts the value after the given element.
     *
     * @param mixed|null $element Element to insert after
     * @param mixed|null $value   Value to insert
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function insertAfter($element, $value): self
    {
        $this->ensureMutable('insertAfter');

        $insertAfter = $this->collection
            ->insertAfter($element, $value)
        ;

        return self::of($insertAfter);
    }

    /**
     * Inserts the element at the given position in the map.
     *
     * @param int        $pos     Position the element it should be inserted at
     * @param mixed      $element Element to be inserted
     * @param mixed|null $key     Element key or NULL to assign an integer key automatically
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function insertAt(int $pos, $element, $key = null): self
    {
        $this->ensureMutable('insertAt');

        $insertAt = $this->collection
            ->insertAt($pos, $element, $key)
        ;

        return self::of($insertAt);
    }

    /**
     * Inserts the value before the given element.
     *
     * @param mixed $element Element before the value is inserted
     * @param mixed $value   Element or list of elements to insert
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function insertBefore($element, $value): self
    {
        $this->ensureMutable('insertBefore');

        $insertBefore = $this->collection
            ->insertBefore($element, $value)
        ;

        return self::of($insertBefore);
    }

    /**
     * Combines elements overwriting existing ones.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function merge($elements, bool $recursive = false): self
    {
        $this->ensureMutable('merge');

        $elements = $this->convertElementsToArray($elements);

        $merge = $this->collection
            ->merge($elements, $recursive)
        ;

        return self::of($merge);
    }

    /**
     * Fill up to the specified length with the given value.
     *
     * @param mixed $value Value to fill up with if the map length is smaller than the given size
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function pad(int $size, $value = null): self
    {
        $this->ensureMutable('pad');

        $pad = $this->collection
            ->pad($size, $value)
        ;

        return self::of($pad);
    }

    /**
     * Adds an element at the beginning.
     *
     * @param mixed           $value Item to add at the beginning
     * @param int|string|null $key   Key for the item or NULL to reindex all numerical keys
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function prepend($value, $key = null): self
    {
        $this->ensureMutable('prepend');

        $prepend = $this->collection
            ->prepend($value, $key)
        ;

        return self::of($prepend);
    }

    /**
     * Adds an element to the end.
     *
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function push($value, ?\Closure $callback = null): self
    {
        $this->ensureMutable('push');

        if ($callback instanceof \Closure && !$callback($value)) {
            return $this;
        }

        $this->collection->push($value);

        return $this;
    }

    /**
     * Sets the given key and value in the map.
     *
     * @param int|string $key   Key to set the new value for
     * @param mixed      $value New element that should be set
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function put($key, $value): self
    {
        $this->ensureMutable('put');

        $put = $this->collection
            ->put($key, $value)
        ;

        return self::of($put);
    }

    /**
     * Overwrites or adds an element.
     *
     * @param mixed|null $key
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function set($key, $value, ?\Closure $callback = null): void
    {
        $this->ensureMutable('set');

        if ($callback instanceof \Closure && !$callback($key, $value)) {
            return;
        }

        $this->collection
            ->set($key, $value)
        ;
    }

    /**
     * Adds the elements without overwriting existing ones.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function union($elements): self
    {
        $this->ensureMutable('union');

        $elements = $this->convertElementsToArray($elements);

        $union = $this->collection
            ->union($elements)
        ;

        return self::of($union);
    }

    /**
     * Adds an element at the beginning.
     *
     * @param mixed           $value Item to add at the beginning
     * @param int|string|null $key   Key for the item or NULL to reindex all numerical keys
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function unshift($value, $key = null): self
    {
        $this->ensureMutable('unshift');

        $unshift = $this->collection
            ->unshift($value, $key)
        ;

        return self::of($unshift);
    }

    /**
     * Returns a copy and sets an element.
     *
     * @param int|string $key   Array key to set or replace
     * @param mixed      $value New value for the given key
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function with($key, $value): self
    {
        $this->ensureMutable('with');

        $with = $this->collection
            ->with($key, $value)
        ;

        return self::of($with);
    }
}
