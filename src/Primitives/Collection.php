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
     * @param array<int|string, mixed>|Collection|null|string $collection
     */
    public static function of($collection = []): self
    {
        if ($collection instanceof self) {
            return $collection;
        }

        return new self(AimeosMap::from($collection));
    }

    /**
     * Clones the map and all objects within.
     *
     * @api
     */
    public function clone(): self
    {
        return new self($this->collection->clone());
    }

    /**
     * Creates a new copy.
     *
     * @api
     */
    public function copy(): self
    {
        $clone = $this->collection
            ->copy();

        return new self($clone);
    }

    /**
     * Splits a string into a map of elements.
     *
     * @api
     */
    public static function explode(string $delimiter, string $string, int $limit = PHP_INT_MAX): self
    {
        return new self(AimeosMap::explode($delimiter, $string, $limit));
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
     * Creates a tree structure from the list items.
     *
     * @param string $idKey Name of the key with the unique ID of the node
     * @param string $parentKey Name of the key with the ID of the parent node
     * @param string $nestKey Name of the key with will contain the children of the node
     * @api
     */
    public function tree( string $idKey, string $parentKey, string $nestKey = 'children' ) : self
    {
        $tree = $this->collection
            ->tree($idKey, $parentKey, $nestKey);

        return new self($tree);
    }

    /**
     * Returns the plain array.
     *
     * @return array<int|string, mixed>
     * @api
     */
    public function all(): array
    {
        return $this->collection
            ->all();
    }

    /**
     * Returns the value at the given position.
     *
     * @return mixed|null
     * @api
     */
    public function at(int $pos)
    {
        return $this->collection
            ->at($pos);
    }

    /**
     * Returns an element by key and casts it to boolean.
     *
     * @param int|string $key
     * @param mixed $default
     * @api
     */
    public function bool($key, $default = false): BoolEnum
    {
        $bool = $this->collection
            ->bool($key, $default);

        return BoolEnum::fromBool($bool);
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
     * @param \Closure $callback Function with (value, key) parameters and returns TRUE/FALSE
     * @param mixed $default Default value or exception if the map contains no elements
     * @param bool $reverse TRUE to test elements from back to front, FALSE for front to back (default)
     * @return mixed First matching value, passed default value or an exception
     * @throws \Throwable
     * @api
     */
    public function find(\Closure $callback, $default = null, bool $reverse = false)
    {
        return $this->collection
            ->find($callback, $default, $reverse);
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
     * @return mixed First key of map or NULL if empty
     * @api
     */
    public function firstKey()
    {
        return $this->collection
            ->firstKey();
    }

    /**
     * Returns an element by key.
     *
     * @param int|string $key
     * @param mixed|null $default
     * @return mixed Value from map or default value
     *
     * @throws \Throwable
     *
     * @api
     */
    public function get($key, $default = null)
    {
        return $this->collection
            ->get($key, $default);
    }

    /**
     * Returns the numerical index of the given key.
     *
     * @param \Closure|string|int $value Key to search for or function with (key) parameters return TRUE if key is found
     * @return int|null Position of the found value (zero based) or NULL if not found
     * @api
     */
    public function index($value): ?int
    {
        return $this->collection
            ->index($value);
    }

    /**
     * Returns an element by key and casts it to integer.
     *
     * @param int|string $key Key or path to the requested item
     * @param mixed $default Default value if key isn't found (will be casted to integer)
     * @api
     */
    public function int($key, $default = 0): Int_
    {
        $int = $this->collection
            ->int($key, $default);

        return Int_::of($int);
    }

    /**
     * Returns an element by key and casts it to float.
     *
     * @param int|string $key Key or path to the requested item
     * @param mixed $default Default value if key isn't found (will be casted to float)
     * @api
     */
    public function float($key, $default = 0.0): Numeric
    {
        $float = $this->collection
            ->float($key, $default);

        return Numeric::fromFloat($float);
    }

    /**
     * Returns all keys.
     *
     * @api
     * @return array-key[]
     */
    public function keys(): array
    {
        return $this->collection
            ->keys()
            ->toArray()
        ;
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
        return $this->collection
            ->last($default);
    }

    /**
     * Returns the last key.
     *
     * @return mixed Last key of map or NULL if empty
     * @api
     */
    public function lastKey()
    {
        return $this->collection
            ->lastKey();
    }

    /**
     * Returns and removes the last element.
     *
     * @return mixed Last element of the map or null if empty
     * @api
     */
    public function pop()
    {
        return $this->collection
            ->pop();
    }

    /**
     * Returns the numerical index of the value.
     *
     * @param \Closure|mixed $value Value to search for or function with (item, key) parameters return TRUE if value is found
     * @api
     */
    public function pos( $value ) : ?int
    {
        return $this->collection
            ->pos($value);
    }

    /**
     * Returns and removes an element by key.
     *
     * @param int|string $key Key to retrieve the value for
     * @param mixed $default Default value if key isn't available
     * @return mixed Value from map or default value
     * @api
     */
    public function pull( $key, $default = null )
    {
        return $this->collection
            ->pull($key, $default);
    }

    /**
     * Returns random elements preserving keys.
     *
     * @param int $max Maximum number of elements that should be returned
     * @api
     */
    public function random( int $max = 1 ) : self
    {
        $random = $this->collection
            ->random($max);

        return new self($random);
    }

    /**
     * Find the key of an element.
     *
     * @param mixed|null $value
     *
     * @return int|string|null Key associated to the value or null if not found
     * @api
     *
     */
    public function search($value, bool $strict = true)
    {
        return $this->collection
            ->search($value, $strict);
    }

    /**
     * Returns and removes the first element.
     *
     * @return mixed|null Value from map or null if not found
     * @api
     */
    public function shift()
    {
        return $this->collection
            ->shift();
    }

    /**
     * Returns an element by key and casts it to string.
     *
     * @param int|string $key Key or path to the requested item
     * @param mixed $default Default value if key isn't found (will be casted to bool)
     * @api
     */
    public function string( $key, $default = '' ) : string
    {
        return $this->collection
            ->string($key, $default);
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
    public function unique( string $key = null ) : self
    {
        $unique = $this->collection
            ->unique($key);

        return new self($unique);
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
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @api
     */
    public function concat($elements): self
    {
        $elements = $this->convertElementsToArray($elements);

        $concat = $this->collection
            ->concat($elements);

        return new self($concat);
    }

    /**
     * Inserts the value after the given element.
     *
     * @param mixed|null $element Element to insert after
     * @param mixed|null $value Value to insert
     * @api
     */
    public function insertAfter($element, $value): self
    {
        $insertAfter = $this->collection
            ->insertAfter($element, $value);

        return new self($insertAfter);
    }

    /**
     * Inserts the element at the given position in the map.
     *
     * @param int $pos Position the element it should be inserted at
     * @param mixed $element Element to be inserted
     * @param mixed|null $key Element key or NULL to assign an integer key automatically
     * @api
     */
    public function insertAt(int $pos, $element, $key = null): self
    {
        $insertAt = $this->collection
            ->insertAt($pos, $element, $key);

        return new self($insertAt);
    }

    /**
     * Inserts the value before the given element.
     *
     * @param mixed $element Element before the value is inserted
     * @param mixed $value Element or list of elements to insert
     * @api
     */
    public function insertBefore($element, $value): self
    {
        $insertBefore = $this->collection
            ->insertBefore($element, $value);

        return new self($insertBefore);
    }

    /**
     * Combines elements overwriting existing ones.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @api
     */
    public function merge($elements, bool $recursive = false): self
    {
        $elements = $this->convertElementsToArray($elements);

        $merge = $this->collection
            ->merge($elements, $recursive);

        return new self($merge);
    }

    /**
     * Fill up to the specified length with the given value.
     *
     * @param mixed $value Value to fill up with if the map length is smaller than the given size
     * @api
     */
    public function pad( int $size, $value = null ) : self
    {
        $pad = $this->collection
            ->pad($size, $value);

        return new self($pad);
    }

    /**
     * Adds an element at the beginning.
     *
     * @param mixed $value Item to add at the beginning
     * @param int|string|null $key Key for the item or NULL to reindex all numerical keys
     * @api
     */
    public function prepend( $value, $key = null ) : self
    {
        $prepend = $this->collection
            ->prepend($value, $key);

        return new self($prepend);
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
     * @param int|string $key Key to set the new value for
     * @param mixed $value New element that should be set
     * @api
     */
    public function put( $key, $value ) : self
    {
        $put = $this->collection
            ->put($key, $value);

        return new self($put);
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

        $this->collection
            ->set($key, $value);
    }

    /**
     * Adds the elements without overwriting existing ones.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @api
     */
    public function union( $elements ) : self
    {
        $elements = $this->convertElementsToArray($elements);

        $union = $this->collection
            ->union($elements);

        return new self($union);
    }

    /**
     * Adds an element at the beginning.
     *
     * @param mixed $value Item to add at the beginning
     * @param int|string|null $key Key for the item or NULL to reindex all numerical keys
     * @api
     */
    public function unshift( $value, $key = null ) : self
    {
        $unshift = $this->collection
            ->unshift($value, $key);

        return new self($unshift);
    }

    /**
     * Returns a copy and sets an element.
     *
     * @param int|string $key Array key to set or replace
     * @param mixed $value New value for the given key
     * @api
     */
    public function with( $key, $value ) : self
    {
        $with = $this->collection
            ->with($key, $value);

        return new self($with);
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
    public function count(): Int_
    {
        $count = $this->collection->count();

        return Int_::of($count);
    }

    /**
     * Counts how often the same values are in the map.
     *
     * @param callable|null $callback Function with (value, key) parameters which returns the value to use for counting
     * @api
     */
    public function countBy(callable $callback = null): self
    {
        $countBy = $this->collection
            ->countBy($callback);

        return new self($countBy);
    }

    /**
     * Returns the maximum value of all elements.
     *
     * @api
     */
    public function max(?string $key = null): Numeric
    {
        if ($this->isEmpty()->isTrue()) {
            return Numeric::of(0);
        }

        $max = $this->collection
            ->max($key);

        return Numeric::fromFloat($max);
    }

    /**
     * Returns the minium value of all elements.
     *
     * @api
     */
    public function min(?string $key = null): Numeric
    {
        if ($this->isEmpty()->isTrue()) {
            return Numeric::of(0);
        }

        $min = $this->collection
            ->min($key);

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
    public function dump(callable $callback = null) : self
    {
        $dump = $this->collection
            ->dump($callback);

        return new self($dump);
    }

    /**
     * Passes a clone of the map to the given callback.
     *
     * @param callable $callback Function receiving ($map) parameter
     * @api
     */
    public function tap( callable $callback ) : self
    {
        $tap = $this->collection
            ->tap($callback);

        return new self($tap);
    }

    /**
     * Reverse sort elements preserving keys.
     *
     * @api
     */
    public function arsort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->arsort($options);

        return new self($clone);
    }

    /**
     * Sort elements preserving keys.
     *
     * @api
     */
    public function asort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->asort($options);

        return new self($clone);
    }

    /**
     * Reverse sort elements by keys.
     *
     * @api
     */
    public function krsort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->krsort($options);

        return new self($clone);
    }

    /**
     * Sort elements by keys.
     *
     * @api
     */
    public function ksort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->ksort($options);

        return new self($clone);
    }

    /**
     * Orders elements by the passed keys.
     *
     * @param iterable<mixed> $keys Keys of the elements in the required order
     * @api
     */
    public function order(iterable $keys) : self
    {
        $order = $this->collection
            ->order($keys);

        return new self($order);
    }

    /**
     * Reverses the array order preserving keys.
     *
     * @api
     */
    public function reverse() : self
    {
        $reverse = $this->collection
            ->reverse();

        return new self($reverse);
    }

    /**
     * Reverse sort elements using new keys.
     *
     * @api
     */
    public function rsort( int $options = SORT_REGULAR ) : self
    {
        $clone = $this->collection;
        $clone->rsort($options);

        return new self($clone);
    }

    /**
     * Randomizes the element order.
     *
     * @api
     */
    public function shuffle( bool $assoc = false ) : self
    {
        $shuffle = $this->collection
            ->shuffle($assoc);

        return new self($shuffle);
    }

    /**
     * Sorts the elements assigning new keys.
     *
     * @api
     */
    public function sort(int $options = SORT_REGULAR) : self
    {
        $sort = $this->collection
            ->sort($options);

        return new self($sort);
    }

    /**
     * Returns the duplicate values from the map.
     *
     * For nested arrays, you have to pass the name of the column of the nested
     * array which should be used to check for duplicates.
     *
     * @param string|null $key
     * @return self
     * @api
     */
    public function duplicates(string $key = null) : self
    {
        $duplicates = $this->collection
            ->duplicates($key);

        return new self($duplicates);
    }

    /**
     * Sorts elements preserving keys using callback.
     *
     * @api
     */
    public function uasort( callable $callback ) : self
    {
        $uasort = $this->collection
            ->uasort($callback);

        return new self($uasort);
    }

    /**
     * Sorts elements by keys using callback.
     *
     * @api
     */
    public function uksort( callable $callback ) : self
    {
        $uksort = $this->collection
            ->uksort($callback);

        return new self($uksort);
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
     * @param \Closure|int|string $value
     * @api
     */
    public function after($value): self
    {
        $after = $this->collection
            ->after($value);

        return new self($after);
    }

    /**
     * Returns the elements before the given one.
     *
     * @param \Closure|int|string $value
     * @api
     */
    public function before($value): self
    {
        $before = $this->collection
            ->before($value);

        return new self($before);
    }

    /**
     * Removes all elements.
     *
     * @api
     */
    public function clear(): self
    {
        $clear = $this->collection
            ->clear();

        return new self($clear);
    }

    /**
     * Returns the elements missing in the given list.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param callable|null $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     * @api
     */
    public function diff($elements, callable $callback = null): self
    {
        $elements = $this->convertElementsToArray($elements);

        $diff = $this->collection
            ->diff($elements, $callback);

        return new self($diff);
    }

    /**
     * Returns the elements missing in the given list and checks keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param callable|null $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     * @api
     */
    public function diffAssoc($elements, callable $callback = null): self
    {
        $elements = $this->convertElementsToArray($elements);

        $diffAssoc = $this->collection
            ->diffAssoc($elements, $callback);

        return new self($diffAssoc);
    }

    /**
     * Returns the elements missing in the given list by keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param callable|null $callback Function with (valueA, valueB) parameters and returns -1 (<), 0 (=) and 1 (>)
     * @api
     */
    public function diffKeys($elements, callable $callback = null ) : self
    {
        $elements = $this->convertElementsToArray($elements);

        $diffKeys = $this->collection
            ->diffKeys($elements, $callback);

        return new self($diffKeys);
    }

    /**
     * Returns a new map without the passed element keys.
     *
     * @param iterable<string|int>|array<string|int>|string|int $keys List of keys to remove
     * @api
     */
    public function except($keys): self
    {
        $except = $this->collection
            ->except($keys);

        return new self($except);
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
    public function grep(string $pattern, int $flags = 0): self
    {
        $grep = $this->collection
            ->grep($pattern, $flags);

        return new self($grep);
    }

    /**
     * Returns the elements shared.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @api
     */
    public function intersect($elements, callable $callback = null): self
    {
        $elements = $this->convertElementsToArray($elements);

        $intersect = $this->collection
            ->intersect($elements, $callback);

        return new self($intersect);
    }

    /**
     * Returns the elements shared and checks keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @api
     */
    public function intersectAssoc($elements, callable $callback = null): self
    {
        $elements = $this->convertElementsToArray($elements);

        $intersectAssoc = $this->collection
            ->intersectAssoc($elements, $callback);

        return new self($intersectAssoc);
    }

    /**
     * Returns the elements shared by keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @api
     */
    public function intersectKeys($elements, callable $callback = null): self
    {
        $elements = $this->convertElementsToArray($elements);

        $intersectKeys = $this->collection
            ->intersectKeys($elements, $callback);

        return new self($intersectKeys);
    }

    /**
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @return array<int|string,mixed>
     */
    private function convertElementsToArray($elements): array
    {
        if ($elements instanceof self) {
            return $elements->all();
        }

        return (array) $elements;
    }

    /**
     * Returns every nth element from the map.
     *
     * @api
     */
    public function nth(int $step, int $offset = 0): self
    {
        $nth = $this->collection
            ->nth($step, $offset);

        return new self($nth);
    }

    /**
     * Returns only those elements specified by the keys.
     *
     * @param iterable<mixed>|array<mixed>|string|int $keys Keys of the elements that should be returned
     * @api
     */
    public function only($keys): self
    {
        $only = $this->collection
            ->only($keys);

        return new self($only);
    }

    /**
     * Removes all matched elements.
     *
     * @param Closure|mixed $callback Function with (item) parameter which returns TRUE/FALSE or value to compare with
     * @api
     */
    public function reject( $callback = true ) : self
    {
        $reject = $this->collection
            ->reject($callback);

        return new self($reject);
    }

    /**
     * Removes an element by key.
     *
     * @param iterable<string|int>|array<string|int>|string|int $keys List of keys to remove
     * @api
     */
    public function remove( $keys ) : self
    {
        $remove = $this->collection
            ->remove($keys);

        return new self($remove);
    }

    /**
     * Skips the given number of items and return the rest.
     *
     * @param \Closure|int|array<array-key,mixed> $offset Number of items to skip or function($item, $key) returning true for skipped items
     * @api
     */
    public function skip( $offset ) : self
    {
        $skip = $this->collection
            ->skip($offset);

        return new self($skip);
    }

    /**
     * Returns a slice of the map.
     *
     * @param int $offset Number of elements to start from
     * @param int|null $length Number of elements to return or NULL for no limit
     * @api
     */
    public function slice( int $offset, int $length = null ) : self
    {
        $slice = $this->collection
            ->slice($offset, $length);

        return new self($slice);
    }

    /**
     * Returns a new map with the given number of items.
     *
     * @param int $size Number of items to return
     * @param \Closure|int|array<array-key,mixed> $offset Number of items to skip or function($item, $key) returning true for skipped items
     * @api
     */
    public function take( int $size, $offset = 0 ) : self
    {
        $take = $this->collection
            ->take($size, $offset);

        return new self($take);
    }

    /**
     * Filters the list of elements by a given condition.
     *
     * @param string $key Key or path of the value in the array or object used for comparison
     * @param string $op Operator used for comparison
     * @param mixed $value Value used for comparison
     * @api
     */
    public function where( string $key, string $op, $value ) : self
    {
        $where = $this->collection
            ->where($key, $op, $value);

        return new self($where);
    }

    /**
     * Compares the value against all map elements.
     *
     * @api
     */
    public function compare(string $value, bool $case = true): BoolEnum
    {
        $compare = $this->collection
            ->compare($value, $case);

        return BoolEnum::fromBool($compare);
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
    public function empty(): BoolEnum
    {
        $empty = $this->collection
            ->empty();

        return BoolEnum::fromBool($empty);
    }

    /**
     * Tests if map contents are equal.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements to test against
     * @api
     */
    public function equals($elements): BoolEnum
    {
        $elements = $this->convertElementsToArray($elements);

        $equals = $this->collection
            ->equals($elements);

        return BoolEnum::fromBool($equals);
    }

    /**
     * Verifies that all elements pass the test of the given callback.
     *
     * @api
     */
    public function every(\Closure $callback): BoolEnum
    {
        $every = $this->collection
            ->every($callback);

        return BoolEnum::fromBool($every);
    }

    /**
     * Tests if a key exists.
     *
     * @param array<int|string>|int|string $key Key of the requested item or list of keys
     * @api
     */
    public function has($key): BoolEnum
    {
        $has = $this->collection
            ->has($key);

        return BoolEnum::fromBool($has);
    }

    /**
     * Executes callbacks depending on the condition.
     *
     * @param \Closure|bool $condition Boolean or function with (map) parameter returning a boolean
     * @param \Closure|null $then Function with (map, condition) parameter (optional)
     * @param \Closure|null $else Function with (map, condition) parameter (optional)
     * @api
     */
    public function if($condition, \Closure $then = null, \Closure $else = null): self
    {
        $if = $this->collection
            ->if($condition, $then, $else);

        return new self($if);
    }

    /**
     * Executes callbacks if the map contains elements.
     *
     * @api
     */
    public function ifAny(\Closure $then = null, \Closure $else = null): self
    {
        $ifAny = $this->collection
            ->ifAny($then, $else);

        return new self($ifAny);
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
     * @param mixed|array $element Element or elements to search for in the map
     * @api
     */
    public function in($element, bool $strict = false): BoolEnum
    {
        $in = $this->collection
            ->in($element, $strict);

        return BoolEnum::fromBool($in);
    }

    /**
     * Tests if element is included.
     *
     * @param mixed|array $element Element or elements to search for in the map
     * @param bool $strict TRUE to check the type too, using FALSE '1' and 1 will be the same
     * @api
     */
    public function includes($element, bool $strict = false): BoolEnum
    {
        $includes = $this->collection
            ->includes($element, $strict);

        return BoolEnum::fromBool($includes);
    }

    /**
     * Tests if the map consists of the same keys and values.
     *
     * @param iterable<int|string,mixed>|Collection $list List of key/value pairs to compare with
     * @param bool $strict TRUE for comparing order of elements too, FALSE for key/values only
     * @api
     */
    public function is($list, bool $strict = false): BoolEnum
    {
        $list = $this->convertElementsToArray($list);

        $is = $this->collection
            ->is($list, $strict);

        return BoolEnum::fromBool($is);
    }

    /**
     * Tests if map is empty.
     *
     * @api
     */
    public function isEmpty(): BoolEnum
    {
        $isEmpty = $this->collection
            ->isEmpty();

        return BoolEnum::fromBool($isEmpty);
    }

    /**
     * Tests if all entries are numeric values.
     *
     * @api
     */
    public function isNumeric(): BoolEnum
    {
        $isNumeric = $this->collection
            ->isNumeric();

        return BoolEnum::fromBool($isNumeric);
    }

    /**
     * Tests if all entries are objects.
     *
     * @api
     */
    public function isObject(): BoolEnum
    {
        $isObject = $this->collection
            ->isObject();

        return BoolEnum::fromBool($isObject);
    }

    /**
     * Tests if all entries are scalar values.
     *
     * @api
     */
    public function isScalar(): BoolEnum
    {
        $isScalar = $this->collection
            ->isScalar();

        return BoolEnum::fromBool($isScalar);
    }

    /**
     * Tests if all entries are objects implementing the interface.
     *
     * @param \Throwable|bool|string $throw Passing TRUE or an exception name will throw the exception instead of returning FALSE
     * @throws \Throwable
     * @api
     */
    public function implements(string $interface, $throw = false): BoolEnum
    {
        $implements = $this->collection
            ->implements($interface, $throw);

        return BoolEnum::fromBool($implements);
    }

    /**
     * Tests if none of the elements are part of the map.
     *
     * @param mixed|null $element Element or elements to search for in the map
     * @api
     */
    public function none($element, bool $strict = false): BoolEnum
    {
        $none = $this->collection
            ->none($element, $strict);

        return BoolEnum::fromBool($none);
    }

    /**
     * Tests if at least one element is included.
     *
     * @param \Closure|iterable|mixed $values Anonymous function with (item, key) parameter, element or list of elements to test against
     * @api
     */
    public function some($values, bool $strict = false ) : BoolEnum
    {
        $some = $this->collection
            ->some($values, $strict);

        return BoolEnum::fromBool($some);
    }

    /**
     * Tests if at least one of the passed strings is part of at least one entry.
     *
     * @param mixed $value The string or list of strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     * @api
     */
    public function strContains( $value, string $encoding = 'UTF-8' ) : BoolEnum
    {
        $strContains = $this->collection
            ->strContains($value, $encoding);

        return BoolEnum::fromBool($strContains);
    }

    /**
     * Tests if all of the entries contains one of the passed strings.
     *
     * @param mixed $value The string or list of strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     * @api
     */
    public function strContainsAll( $value, string $encoding = 'UTF-8' ) : BoolEnum
    {
        $strContainsAll = $this->collection
            ->strContainsAll($value, $encoding);

        return BoolEnum::fromBool($strContainsAll);
    }

    /**
     * Tests if at least one of the entries ends with one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value The string or strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     * @api
     */
    public function strEnds( $value, string $encoding = 'UTF-8' ) : BoolEnum
    {
        $strEnds = $this->collection
            ->strEnds($value, $encoding);

        return BoolEnum::fromBool($strEnds);
    }

    /**
     * Tests if all of the entries ends with at least one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value The string or strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     * @api
     */
    public function strEndsAll( $value, string $encoding = 'UTF-8' ) : BoolEnum
    {
        $strEndsAll = $this->collection
            ->strEndsAll($value, $encoding);

        return BoolEnum::fromBool($strEndsAll);
    }

    /**
     * Tests if at least one of the entries starts with at least one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value The string or strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     * @api
     */
    public function strStarts( $value, string $encoding = 'UTF-8' ) : BoolEnum
    {
        $strStarts = $this->collection
            ->strStarts($value, $encoding);

        return BoolEnum::fromBool($strStarts);
    }

    /**
     * Tests if all of the entries starts with one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value The string or strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     * @api
     */
    public function strStartsAll( $value, string $encoding = 'UTF-8' ) : BoolEnum
    {
        $strStartsAll = $this->collection
            ->strStartsAll($value, $encoding);

        return BoolEnum::fromBool($strStartsAll);
    }

    /**
     * Casts all entries to the passed type.
     *
     * @api
     */
    public function cast(string $type = 'string'): self
    {
        $cast = $this->collection
            ->cast($type);

        return new self($cast);
    }

    /**
     * Splits the map into chunks.
     *
     * @api
     */
    public function chunk(int $size, bool $preserve = false): self
    {
        $chunk = $this->collection
            ->chunk($size, $preserve);

        return new self($chunk);
    }

    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    public function col(string $valuecol = null, string $indexcol = null): self
    {
        $col = $this->collection
            ->col($valuecol, $indexcol);

        return new self($col);
    }

    /**
     * Collapses multi-dimensional elements overwriting elements.
     *
     * @api
     */
    public function collapse(int $depth = null): self
    {
        $collapse = $this->collection
            ->collapse($depth);

        return new self($collapse);
    }

    /**
     * Combines the map elements as keys with the given values.
     *
     * @param iterable<int|string,mixed> $values
     * @api
     */
    public function combine(iterable $values): self
    {
        $combine = $this->collection
            ->combine($values);

        return new self($combine);
    }

    /**
     * Flattens multi-dimensional elements without overwriting elements.
     *
     * @api
     */
    public function flat(int $depth = null): self
    {
        $flat = $this->collection
            ->flat($depth);

        return new self($flat);
    }

    /**
     * Exchanges keys with their values.
     *
     * @api
     */
    public function flip(): self
    {
        $flip = $this->collection
            ->flip();

        return new self($flip);
    }

    /**
     * Groups associative array elements or objects.
     *
     * @param \Closure|string|int $key Closure function with (item, idx) parameters returning the key or the key itself to group by
     * @api
     */
    public function groupBy($key): self
    {
        $groupBy = $this->collection
            ->groupBy($key);

        return new self($groupBy);
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
    public function ltrim(string $chars = " \n\r\t\v\x00"): self
    {
        $ltrim = $this->collection
            ->ltrim($chars);

        return new self($ltrim);
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
     * @param \Closure|int|array<array-key,mixed> $number Function with (value, index) as arguments returning the bucket key or number of groups
     * @api
     */
    public function partition( $number ) : self
    {
        $partition = $this->collection
            ->partition($number);

        return new self($partition);
    }

    /**
     * Applies a callback to the whole map.
     *
     * @param \Closure $callback Function with map as parameter which returns arbitrary result
     * @return mixed Result returned by the callback
     * @api
     */
    public function pipe( \Closure $callback )
    {
        return $this->collection
            ->pipe($callback);
    }

    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    public function pluck( string $valuecol = null, string $indexcol = null ) : self
    {
        $pluck = $this->collection
            ->pluck($valuecol, $indexcol);

        return new self($pluck);
    }

    /**
     * Adds a prefix to each map entry.
     *
     * @param \Closure|string $prefix Prefix string or anonymous function with ($item, $key) as parameters
     * @param int|null $depth Maximum depth to dive into multi-dimensional arrays starting from "1"
     * @api
     */
    public function prefix( $prefix, int $depth = null ) : self
    {
        $prefix = $this->collection
            ->prefix($prefix, $depth);

        return new self($prefix);
    }

    /**
     * Computes a single value from the map content.
     *
     * @param callable $callback Function with (result, value) parameters and returns result
     * @param mixed $initial Initial value when computing the result
     * @return mixed Value computed by the callback function
     * @api
     */
    public function reduce( callable $callback, $initial = null )
    {
        return $this->collection
            ->reduce($callback, $initial);
    }

    /**
     * Changes the keys according to the passed function.
     *
     * @api
     */
    public function rekey(callable $callback): self
    {
        $map = $this->collection->rekey($callback);

        return new self($map);
    }

    /**
     * Replaces elements recursively.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     * @param bool $recursive TRUE to replace recursively (default), FALSE to replace elements only
     * @api
     */
    public function replace( $elements, bool $recursive = true ) : self
    {
        $elements = $this->convertElementsToArray($elements);

        $replace = $this->collection
            ->replace($elements, $recursive);

        return new self($replace);
    }

    /**
     * Removes the passed characters from the right of all strings.
     *
     * @api
     */
    public function rtrim( string $chars = " \n\r\t\v\x00" ) : self
    {
        $rtrim = $this->collection
            ->rtrim($chars);

        return new self($rtrim);
    }

    /**
     * Replaces a slice by new elements.
     *
     * @param int $offset Number of elements to start from
     * @param int|null $length Number of elements to remove, NULL for all
     * @param mixed $replacement List of elements to insert
     * @api
     */
    public function splice( int $offset, int $length = null, $replacement = [] ) : self
    {
        $splice = $this->collection
            ->splice($offset, $length, $replacement);

        return new self($splice);
    }

    /**
     * Returns the strings after the passed value.
     *
     * @param string $value Character or string to search for
     * @param bool $case TRUE if search should be case insensitive, FALSE if case-sensitive
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     * @api
     */
    public function strAfter( string $value, bool $case = false, string $encoding = 'UTF-8' ) : self
    {
        $strAfter = $this->collection
            ->strAfter($value, $case, $encoding);

        return new self($strAfter);
    }

    /**
     * Converts all alphabetic characters to lower case.
     *
     * @api
     */
    public function strLower( string $encoding = 'UTF-8' ) : self
    {
        $strLower = $this->collection
            ->strLower($encoding);

        return new self($strLower);
    }

    /**
     * Replaces all occurrences of the search string with the replacement string.
     *
     * @param array<array-key, mixed>|string $search String or list of strings to search for
     * @param array<array-key, mixed>|string $replace String or list of strings of replacement strings
     * @param bool $case TRUE if replacements should be case insensitive, FALSE if case-sensitive
     * @api
     */
    public function strReplace( $search, $replace, bool $case = false ) : self
    {
        $strReplace = $this->collection
            ->strReplace($search, $replace, $case);

        return new self($strReplace);
    }

    /**
     * Converts all alphabetic characters to upper case.
     *
     * @api
     */
    public function strUpper( string $encoding = 'UTF-8' ) :self
    {
        $strUpper = $this->collection
            ->strUpper($encoding);

        return new self($strUpper);
    }

    /**
     * Adds a suffix to each map entry.
     *
     * @param \Closure|string $suffix Suffix string or anonymous function with ($item, $key) as parameters
     * @param int|null $depth Maximum depth to dive into multi-dimensional arrays starting from "1"
     * @api
     */
    public function suffix( $suffix, int $depth = null ) : self
    {
        $suffix = $this->collection
            ->suffix($suffix, $depth);

        return new self($suffix);
    }

    /**
     * Returns the elements in JSON format.
     *
     * @api
     */
    public function toJson(int $options = 0): ?string
    {
        return $this->collection
            ->toJson($options);
    }

    /**
     * Creates a HTTP query string.
     *
     * @api
     */
    public function toUrl(): string
    {
        return $this->collection
            ->toUrl();
    }

    /**
     * Exchanges rows and columns for a two dimensional map.
     *
     * @api
     */
    public function transpose(): self
    {
        $transpose = $this->collection
            ->transpose();

        return new self($transpose);
    }

    /**
     * Traverses trees of nested items passing each item to the callback.
     *
     * @param \Closure|null $callback Callback with (entry, key, level, $parent) arguments, returns the entry added to result
     * @param string $nestKey Key to the children of each item
     * @api
     */
    public function traverse( \Closure $callback = null, string $nestKey = 'children' ) : self
    {
        $traverse = $this->collection
            ->traverse($callback, $nestKey);

        return new self($traverse);
    }

    /**
     * Removes the passed characters from the left/right of all strings.
     *
     * @api
     */
    public function trim( string $chars = " \n\r\t\v\x00" ) : self
    {
        $trim = $this->collection
            ->trim($chars);

        return new self($trim);
    }

    /**
     * Applies the given callback to all elements.
     *
     * @param callable $callback Function with (item, key, data) parameters
     * @param mixed $data Arbitrary data that will be passed to the callback as third parameter
     * @param bool $recursive TRUE to traverse sub-arrays recursively (default), FALSE to iterate Map elements only
     * @api
     */
    public function walk( callable $callback, $data = null, bool $recursive = true ) : self
    {
        $walk = $this->collection
            ->walk($callback, $data, $recursive);

        return new self($walk);
    }

    /**
     * Merges the values of all arrays at the corresponding index.
     *
     * @param array<int|string,mixed>|\Traversable<int|string,mixed>|\Iterator<int|string,mixed> $arrays List of arrays to merge with at the same position
     * @api
     */
    public function zip( ...$arrays ) : self
    {
        $zip = $this->collection
            ->zip(...$arrays);

        return new self($zip);
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
     * Checks if the key exists.
     *
     * @param int|string $key Key to check for
     * @api
     */
    public function offsetExists($key): BoolEnum
    {
        $exists = $this->collection
            ->offsetExists($key);

        return BoolEnum::fromBool($exists);
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
     * Sets the separator for paths to multi-dimensional arrays in the current map.
     *
     * @param string $char Separator character, e.g. "." for "key.to.value" instead of "key/to/value"
     * @api
     */
    public function sep( string $char ) : self
    {
        $sep = $this->collection
            ->sep($char);

        return new self($sep);
    }

    /**
     * Returns the strings before the passed value.
     *
     * @param string $value Character or string to search for
     * @param bool $case TRUE if search should be case insensitive, FALSE if case-sensitive
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     * @api
     */
    public function strBefore( string $value, bool $case = false, string $encoding = 'UTF-8' ) : self
    {
        $strBefore = $this->collection
            ->strBefore($value, $case, $encoding);

        return new self($strBefore);
    }
}
