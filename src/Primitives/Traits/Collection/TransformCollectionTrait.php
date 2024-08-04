<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Primitives\Collection;

trait TransformCollectionTrait
{
    /**
     * Casts all entries to the passed type.
     *
     * @api
     */
    public function cast(string $type = 'string'): self
    {
        $cast = $this->collection
            ->cast($type)
        ;

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
            ->chunk($size, $preserve)
        ;

        return new self($chunk);
    }

    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    public function col(?string $valuecol = null, ?string $indexcol = null): self
    {
        $col = $this->collection
            ->col($valuecol, $indexcol)
        ;

        return new self($col);
    }

    /**
     * Collapses multi-dimensional elements overwriting elements.
     *
     * @api
     */
    public function collapse(?int $depth = null): self
    {
        $collapse = $this->collection
            ->collapse($depth)
        ;

        return new self($collapse);
    }

    /**
     * Combines the map elements as keys with the given values.
     *
     * @param iterable<int|string,mixed> $values
     *
     * @api
     */
    public function combine(iterable $values): self
    {
        $combine = $this->collection
            ->combine($values)
        ;

        return new self($combine);
    }

    /**
     * Flattens multi-dimensional elements without overwriting elements.
     *
     * @api
     */
    public function flat(?int $depth = null): self
    {
        $flat = $this->collection
            ->flat($depth)
        ;

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
            ->flip()
        ;

        return new self($flip);
    }

    /**
     * Groups associative array elements or objects.
     *
     * @param \Closure|string|int $key Closure function with (item, idx) parameters returning the key or the key itself to group by
     *
     * @api
     */
    public function groupBy($key): self
    {
        $groupBy = $this->collection
            ->groupBy($key)
        ;

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
            ->join($glue)
        ;
    }

    /**
     * Removes the passed characters from the left of all strings.
     *
     * @api
     */
    public function ltrim(string $chars = " \n\r\t\v\x00"): self
    {
        $ltrim = $this->collection
            ->ltrim($chars)
        ;

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
     *
     * @api
     */
    public function partition($number): self
    {
        $partition = $this->collection
            ->partition($number)
        ;

        return new self($partition);
    }

    /**
     * Applies a callback to the whole map.
     *
     * @param \Closure $callback Function with map as parameter which returns arbitrary result
     *
     * @return mixed Result returned by the callback
     *
     * @api
     */
    public function pipe(\Closure $callback)
    {
        return $this->collection
            ->pipe($callback)
        ;
    }

    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    public function pluck(?string $valuecol = null, ?string $indexcol = null): self
    {
        $pluck = $this->collection
            ->pluck($valuecol, $indexcol)
        ;

        return new self($pluck);
    }

    /**
     * Adds a prefix to each map entry.
     *
     * @param \Closure|string $prefix Prefix string or anonymous function with ($item, $key) as parameters
     * @param int|null        $depth  Maximum depth to dive into multi-dimensional arrays starting from "1"
     *
     * @api
     */
    public function prefix($prefix, ?int $depth = null): self
    {
        $prefix = $this->collection
            ->prefix($prefix, $depth)
        ;

        return new self($prefix);
    }

    /**
     * Computes a single value from the map content.
     *
     * @param callable $callback Function with (result, value) parameters and returns result
     * @param mixed    $initial  Initial value when computing the result
     *
     * @return mixed Value computed by the callback function
     *
     * @api
     */
    public function reduce(callable $callback, $initial = null)
    {
        return $this->collection
            ->reduce($callback, $initial)
        ;
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
     * @param iterable<int|string,mixed>|Collection $elements  List of elements
     * @param bool                                  $recursive TRUE to replace recursively (default), FALSE to replace elements only
     *
     * @api
     */
    public function replace($elements, bool $recursive = true): self
    {
        $elements = $this->convertElementsToArray($elements);

        $replace = $this->collection
            ->replace($elements, $recursive)
        ;

        return new self($replace);
    }

    /**
     * Removes the passed characters from the right of all strings.
     *
     * @api
     */
    public function rtrim(string $chars = " \n\r\t\v\x00"): self
    {
        $rtrim = $this->collection
            ->rtrim($chars)
        ;

        return new self($rtrim);
    }

    /**
     * Replaces a slice by new elements.
     *
     * @param int      $offset      Number of elements to start from
     * @param int|null $length      Number of elements to remove, NULL for all
     * @param mixed    $replacement List of elements to insert
     *
     * @api
     */
    public function splice(int $offset, ?int $length = null, $replacement = []): self
    {
        $splice = $this->collection
            ->splice($offset, $length, $replacement)
        ;

        return new self($splice);
    }

    /**
     * Returns the strings after the passed value.
     *
     * @param string $value    Character or string to search for
     * @param bool   $case     TRUE if search should be case insensitive, FALSE if case-sensitive
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strAfter(string $value, bool $case = false, string $encoding = 'UTF-8'): self
    {
        $strAfter = $this->collection
            ->strAfter($value, $case, $encoding)
        ;

        return new self($strAfter);
    }

    /**
     * Converts all alphabetic characters to lower case.
     *
     * @api
     */
    public function strLower(string $encoding = 'UTF-8'): self
    {
        $strLower = $this->collection
            ->strLower($encoding)
        ;

        return new self($strLower);
    }

    /**
     * Replaces all occurrences of the search string with the replacement string.
     *
     * @param array<array-key, mixed>|string $search  String or list of strings to search for
     * @param array<array-key, mixed>|string $replace String or list of strings of replacement strings
     * @param bool                           $case    TRUE if replacements should be case insensitive, FALSE if case-sensitive
     *
     * @api
     */
    public function strReplace($search, $replace, bool $case = false): self
    {
        $strReplace = $this->collection
            ->strReplace($search, $replace, $case)
        ;

        return new self($strReplace);
    }

    /**
     * Converts all alphabetic characters to upper case.
     *
     * @api
     */
    public function strUpper(string $encoding = 'UTF-8'): self
    {
        $strUpper = $this->collection
            ->strUpper($encoding)
        ;

        return new self($strUpper);
    }

    /**
     * Adds a suffix to each map entry.
     *
     * @param \Closure|string $suffix Suffix string or anonymous function with ($item, $key) as parameters
     * @param int|null        $depth  Maximum depth to dive into multi-dimensional arrays starting from "1"
     *
     * @api
     */
    public function suffix($suffix, ?int $depth = null): self
    {
        $suffix = $this->collection
            ->suffix($suffix, $depth)
        ;

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
            ->toJson($options)
        ;
    }

    /**
     * Creates a HTTP query string.
     *
     * @api
     */
    public function toUrl(): string
    {
        return $this->collection
            ->toUrl()
        ;
    }

    /**
     * Exchanges rows and columns for a two dimensional map.
     *
     * @api
     */
    public function transpose(): self
    {
        $transpose = $this->collection
            ->transpose()
        ;

        return new self($transpose);
    }

    /**
     * Traverses trees of nested items passing each item to the callback.
     *
     * @param \Closure|null $callback Callback with (entry, key, level, $parent) arguments, returns the entry added to result
     * @param string        $nestKey  Key to the children of each item
     *
     * @api
     */
    public function traverse(?\Closure $callback = null, string $nestKey = 'children'): self
    {
        $traverse = $this->collection
            ->traverse($callback, $nestKey)
        ;

        return new self($traverse);
    }

    /**
     * Removes the passed characters from the left/right of all strings.
     *
     * @api
     */
    public function trim(string $chars = " \n\r\t\v\x00"): self
    {
        $trim = $this->collection
            ->trim($chars)
        ;

        return new self($trim);
    }

    /**
     * Applies the given callback to all elements.
     *
     * @param callable $callback  Function with (item, key, data) parameters
     * @param mixed    $data      Arbitrary data that will be passed to the callback as third parameter
     * @param bool     $recursive TRUE to traverse sub-arrays recursively (default), FALSE to iterate Map elements only
     *
     * @api
     */
    public function walk(callable $callback, $data = null, bool $recursive = true): self
    {
        $walk = $this->collection
            ->walk($callback, $data, $recursive)
        ;

        return new self($walk);
    }

    /**
     * Merges the values of all arrays at the corresponding index.
     *
     * @param array<int|string,mixed>|\Traversable<int|string,mixed>|\Iterator<int|string,mixed> $arrays List of arrays to merge with at the same position
     *
     * @api
     */
    public function zip(...$arrays): self
    {
        $zip = $this->collection
            ->zip(...$arrays)
        ;

        return new self($zip);
    }

    /**
     * Returns the duplicate values from the map.
     *
     * For nested arrays, you have to pass the name of the column of the nested
     * array which should be used to check for duplicates.
     *
     * @api
     */
    public function duplicates(?string $key = null): self
    {
        $duplicates = $this->collection
            ->duplicates($key)
        ;

        return new self($duplicates);
    }
}
