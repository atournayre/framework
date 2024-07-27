<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Aimeos\Map as AimeosMap;

final class Collection
{
    private AimeosMap $collection;

    private function __construct(AimeosMap $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param array<int|string, mixed> $collection
     */
    public static function of(array $collection): self
    {
        return new self(AimeosMap::from($collection));
    }

    /**
     * Clones the map and all objects within.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function clone()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Creates a new copy.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function copy()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Splits a string into a map of elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function explode()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Creates a new map from passed elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function from()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Creates a new map from a JSON string.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function fromJson()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Creates a new map by invoking the closure a number of times.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function times()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Creates a tree structure from the list items.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function tree()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the plain array.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function all()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the value at the given position.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function at()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns an element by key and casts it to boolean.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function bool()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Calls the given method on all items.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function call()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the first/last matching element.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function find()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the first element.
     *
     * @param mixed|null $default
     *
     * @return mixed|null
     *
     * @throws \Throwable
     *
     * @api
     */
    public function first($default = null)
    {
        return $this->collection->first($default);
    }

    /**
     * Returns the first key.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function firstKey()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns an element by key.
     *
     * @param mixed|null $key
     * @param mixed|null $default
     *
     * @throws \Throwable
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function get($key, $default = null)
    {
        return $this->collection->get($key, $default);
    }

    /**
     * Returns the numerical index of the given key.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function index()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns an element by key and casts it to integer.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function int()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns an element by key and casts it to float.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function float()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns all keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function keys()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the last element.
     *
     * @param mixed|null $default
     *
     * @return mixed|null
     *
     * @throws \Throwable
     *
     * @api
     */
    public function last($default = null)
    {
        return $this->collection->last($default);
    }

    /**
     * Returns the last key.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function lastKey()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns and removes the last element.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function pop()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the numerical index of the value.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function pos()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns and removes an element by key.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function pull()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns random elements preserving keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function random()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Find the key of an element.
     *
     * @api
     *
     * @param mixed|null $value
     * @param bool       $strict
     *
     * @return int|string|null
     */
    public function search($value, $strict = true)
    {
        return $this->collection->search($value, $strict);
    }

    /**
     * Returns and removes the first element.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function shift()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns an element by key and casts it to string.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function string()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the plain array.
     *
     * @api
     *
     * @return array<int|string, mixed>
     */
    public function toArray(): array
    {
        return $this->collection->toArray();
    }

    /**
     * Returns all unique elements preserving keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function unique()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns all elements with new keys.
     *
     * @api
     */
    public function values(): self
    {
        $values = $this->collection->values();

        return new self($values);
    }

    /**
     * Adds all elements with new keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function concat()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Inserts the value after the given element.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function insertAfter()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Inserts the element at the given position in the map.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function insertAt()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Inserts the value before the given element.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function insertBefore()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Combines elements overwriting existing ones.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function merge()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Fill up to the specified length with the given value.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function pad()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Adds an element at the beginning.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function prepend()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Adds an element to the end.
     *
     * @api
     *
     * @param mixed|null $value
     */
    public function push($value, ?\Closure $callback = null): self
    {
        if ($callback instanceof \Closure && !$callback($value)) {
            return $this;
        }

        $this->collection->push($value);

        return $this;
    }

    /**
     * Sets the given key and value in the map.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function put()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Overwrites or adds an element.
     *
     * @api
     *
     * @param mixed|null $key
     * @param mixed|null $value
     */
    public function set($key, $value, ?\Closure $callback = null): void
    {
        if ($callback instanceof \Closure && !$callback($key, $value)) {
            return;
        }

        $this->collection->set($key, $value);
    }

    /**
     * Adds the elements without overwriting existing ones.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function union()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Adds an element at the beginning.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function unshift()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns a copy and sets an element.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function with()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the average of all values.
     *
     * @api
     */
    public function avg(?string $key = null): Numeric
    {
        $avg = $this->collection->avg($key);

        return Numeric::fromFloat($avg);
    }

    /**
     * Returns the total number of elements.
     *
     * @api
     */
    public function count(): Numeric
    {
        $count = $this->collection->count();

        return Numeric::of($count);
    }

    /**
     * Counts how often the same values are in the map.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function countBy()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the maximum value of all elements.
     *
     * @api
     */
    public function max(?string $key = null): Numeric
    {
        $max = $this->collection->max($key);

        return Numeric::fromFloat($max);
    }

    /**
     * Returns the minium value of all elements.
     *
     * @api
     */
    public function min(?string $key = null): Numeric
    {
        $min = $this->collection->min($key);

        return Numeric::fromFloat($min);
    }

    /**
     * Returns the sum of all values in the map.
     *
     * @api
     */
    public function sum(?string $key = null): Numeric
    {
        $sum = $this->collection->sum($key);

        return Numeric::fromFloat($sum);
    }

    /**
     * Prints the map content and terminates the script.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function dd()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Prints the map content.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function dump()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Passes a clone of the map to the given callback.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function tap()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Reverse sort elements preserving keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function arsort()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Sort elements preserving keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function asort()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Reverse sort elements by keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function krsort()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Sort elements by keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function ksort()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Orders elements by the passed keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function order()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Reverses the array order preserving keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function reverse()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Reverse sort elements using new keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function rsort()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Randomizes the element order.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function shuffle()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Sorts the elements assigning new keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function sort()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Sorts elements preserving keys using callback.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function uasort()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Sorts elements by keys using callback.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function uksort()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Sorts elements using callback assigning new keys.
     *
     * @api
     */
    public function usort(callable $callback): self
    {
        $this->collection->usort($callback);

        return $this;
    }

    /**
     * Returns the elements after the given one.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function after()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the elements before the given one.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function before()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Removes all elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function clear()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the elements missing in the given list.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function diff()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the elements missing in the given list and checks keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function diffAssoc()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the elements missing in the given list by keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function diffKeys()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns a new map without the passed element keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function except()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Applies a filter to all elements.
     *
     * @api
     */
    public function filter(?callable $callback = null): self
    {
        $filtered = $this->collection->filter($callback);

        return new self($filtered);
    }

    /**
     * Applies a regular expression to all elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function grep()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the elements shared.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function intersect()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the elements shared and checks keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function intersectAssoc()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the elements shared by keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function intersectKeys()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns every nth element from the map.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function nth()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns only those elements specified by the keys.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function only()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Removes all matched elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function reject()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Removes an element by key.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function remove()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Skips the given number of items and return the rest.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function skip()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns a slice of the map.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function slice()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns a new map with the given number of items.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function take()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Filters the list of elements by a given condition.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function where()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Compares the value against all map elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function compare()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if an item exists in the map.
     *
     * @api
     *
     * @param mixed|null $key
     * @param mixed|null $value
     */
    public function contains($key, ?string $operator = null, $value = null): BoolEnum
    {
        $contains = $this->collection->contains($key, $operator, $value);

        return BoolEnum::fromBool($contains);
    }

    /**
     * Applies a callback to each element.
     *
     * @api
     */
    public function each(\Closure $callback): self
    {
        $collection = $this->collection
            ->each($callback)
        ;

        return new self($collection);
    }

    /**
     * Tests if map is empty.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function empty()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if map contents are equal.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function equals()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Verifies that all elements pass the test of the given callback.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function every()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if a key exists.
     *
     * @api
     *
     * @param array-key $key
     */
    public function has($key): BoolEnum
    {
        $has = $this->collection->has($key);

        return BoolEnum::fromBool($has);
    }

    /**
     * Executes callbacks depending on the condition.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function if()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Executes callbacks if the map contains elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function ifAny()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Executes callbacks if the map is empty.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function ifEmpty()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if element is included.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function in()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if element is included.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function includes()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if the item is part of the strings in the map.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function inString()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if the map consists of the same keys and values.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function is()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if map is empty.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function isEmpty()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if all entries are numeric values.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function isNumeric()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if all entries are objects.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function isObject()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if all entries are scalar values.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function isScalar()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if all entries are objects implementing the interface.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function implements()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if none of the elements are part of the map.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function none()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if at least one element is included.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function some()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if at least one of the passed strings is part of at least one entry.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function strContains()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if all of the entries contains one of the passed strings.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function strContainsAll()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if at least one of the entries ends with one of the passed strings.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function strEnds()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if all of the entries ends with at least one of the passed strings.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function strEndsAll()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if at least one of the entries starts with at least one of the passed strings.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function strStarts()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Tests if all of the entries starts with one of the passed strings.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function strStartsAll()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Casts all entries to the passed type.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function cast()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Splits the map into chunks.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function chunk()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function col()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Collapses multi-dimensional elements overwriting elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function collapse()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Combines the map elements as keys with the given values.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function combine()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Flattens multi-dimensional elements without overwriting elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function flat()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Exchanges keys with their values.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function flip()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Groups associative array elements or objects.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function groupBy()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns concatenated elements as string with separator.
     *
     * @api
     */
    public function join(string $glue = ''): string
    {
        return $this->collection
            ->values()
            ->join($glue);
    }

    /**
     * Removes the passed characters from the left of all strings.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function ltrim()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Applies a callback to each element and returns the results.
     *
     * @api
     */
    public function map(callable $callback): self
    {
        $map = $this->collection->map($callback);

        return new self($map);
    }

    /**
     * Breaks the list into the given number of groups.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function partition()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Applies a callback to the whole map.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function pipe()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function pluck()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Adds a prefix to each map entry.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function prefix()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Computes a single value from the map content.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function reduce()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Changes the keys according to the passed function.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function rekey()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Replaces elements recursively.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function replace()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Removes the passed characters from the right of all strings.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function rtrim()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Replaces a slice by new elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function splice()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the strings after the passed value.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function strAfter()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Converts all alphabetic characters to lower case.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function strLower()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Replaces all occurrences of the search string with the replacement string.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function strReplace()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Converts all alphabetic characters to upper case.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function strUpper()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Adds a suffix to each map entry.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function suffix()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns the elements in JSON format.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function toJson()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Creates a HTTP query string.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function toUrl()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Exchanges rows and columns for a two dimensional map.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function transpose()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Traverses trees of nested items passing each item to the callback.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function traverse()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Removes the passed characters from the left/right of all strings.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function trim()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Applies the given callback to all elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function walk()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Merges the values of all arrays at the corresponding index.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function zip()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Sets or returns the seperator for paths to multi-dimensional arrays.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function delimiter()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns an iterator for the elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function getIterator()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Specifies the data which should be serialized to JSON.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function jsonSerialize()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Registers a custom method.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function method()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Checks if the key exists.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function offsetExists()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns an element by key.
     *
     * @param array-key $offset
     *
     * @return mixed|null
     *
     * @api
     */
    public function offsetGet($offset)
    {
        return $this->collection->offsetGet($offset);
    }

    /**
     * Overwrites an element.
     *
     * @api
     *
     * @param mixed|null $key
     * @param mixed|null $value
     */
    public function offsetSet($key, $value, ?\Closure $callback = null): void
    {
        $this->set($key, $value, $callback);
    }

    /**
     * Removes an element by key.
     *
     * @api
     *
     * @param array-key $key
     */
    public function offsetUnset($key): void
    {
        $this->collection->offsetUnset($key);
    }

    /**
     * Sets the seperator for paths to multi-dimensional arrays in the current map.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function sep()
    {
        throw new \RuntimeException('Not implemented yet!');
    }
}
