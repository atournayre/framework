<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Exception\RuntimeException;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;

trait TestCollectionTrait
{
    /**
     * Compares the value against all map elements.
     *
     * @api
     */
    public function compare(string $value, bool $case = true): BoolEnum
    {
        $compare = $this->collection
            ->strCompare($value, $case)
        ;

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
            ->empty()
        ;

        return BoolEnum::fromBool($empty);
    }

    /**
     * Tests if map contents are equal.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements to test against
     *
     * @api
     */
    public function equals($elements): BoolEnum
    {
        $elements = $this->convertElementsToArray($elements);

        $equals = $this->collection
            ->equals($elements)
        ;

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
            ->every($callback)
        ;

        return BoolEnum::fromBool($every);
    }

    /**
     * Tests if a key exists.
     *
     * @param array<int|string>|int|string $key Key of the requested item or list of keys
     *
     * @api
     */
    public function has($key): BoolEnum
    {
        $has = $this->collection
            ->has($key)
        ;

        return BoolEnum::fromBool($has);
    }

    /**
     * Executes callbacks depending on the condition.
     *
     * @param \Closure|bool $condition Boolean or function with (map) parameter returning a boolean
     * @param \Closure|null $then      Function with (map, condition) parameter (optional)
     * @param \Closure|null $else      Function with (map, condition) parameter (optional)
     *
     * @api
     */
    public function if($condition, ?\Closure $then = null, ?\Closure $else = null): self
    {
        $if = $this->collection
            ->if($condition, $then, $else)
        ;

        return new self($if);
    }

    /**
     * Executes callbacks if the map contains elements.
     *
     * @api
     */
    public function ifAny(?\Closure $then = null, ?\Closure $else = null): self
    {
        $ifAny = $this->collection
            ->ifAny($then, $else)
        ;

        return new self($ifAny);
    }

    /**
     * Executes callbacks if the map is empty.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function ifEmpty()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }

    /**
     * Tests if element is included.
     *
     * @param mixed|array $element Element or elements to search for in the map
     *
     * @api
     */
    public function in($element, bool $strict = false): BoolEnum
    {
        $in = $this->collection
            ->in($element, $strict)
        ;

        return BoolEnum::fromBool($in);
    }

    /**
     * Tests if element is included.
     *
     * @param mixed|array $element Element or elements to search for in the map
     * @param bool        $strict  TRUE to check the type too, using FALSE '1' and 1 will be the same
     *
     * @api
     */
    public function includes($element, bool $strict = false): BoolEnum
    {
        $includes = $this->collection
            ->includes($element, $strict)
        ;

        return BoolEnum::fromBool($includes);
    }

    /**
     * Tests if the map consists of the same keys and values.
     *
     * @param iterable<int|string,mixed>|Collection $list   List of key/value pairs to compare with
     * @param bool                                  $strict TRUE for comparing order of elements too, FALSE for key/values only
     *
     * @api
     */
    public function is($list, bool $strict = false): BoolEnum
    {
        $list = $this->convertElementsToArray($list);

        $is = $this->collection
            ->is($list, $strict)
        ;

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
            ->isEmpty()
        ;

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
            ->isNumeric()
        ;

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
            ->isObject()
        ;

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
            ->isScalar()
        ;

        return BoolEnum::fromBool($isScalar);
    }

    /**
     * Tests if all entries are objects implementing the interface.
     *
     * @param \Throwable|bool|string $throw Passing TRUE or an exception name will throw the exception instead of returning FALSE
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function implements(string $interface, $throw = false): BoolEnum
    {
        try {
            $implements = $this->collection
                ->implements($interface, $throw)
            ;
        } catch (\Throwable $e) {
            RuntimeException::fromThrowable($e)->throw();
        }

        return BoolEnum::fromBool($implements);
    }

    /**
     * Tests if none of the elements are part of the map.
     *
     * @param mixed|null $element Element or elements to search for in the map
     *
     * @api
     */
    public function none($element, bool $strict = false): BoolEnum
    {
        $none = $this->collection
            ->none($element, $strict)
        ;

        return BoolEnum::fromBool($none);
    }

    /**
     * Tests if at least one element is included.
     *
     * @param \Closure|iterable|mixed $values Anonymous function with (item, key) parameter, element or list of elements to test against
     *
     * @api
     */
    public function some($values, bool $strict = false): BoolEnum
    {
        $some = $this->collection
            ->some($values, $strict)
        ;

        return BoolEnum::fromBool($some);
    }

    /**
     * Tests if at least one of the passed strings is part of at least one entry.
     *
     * @param mixed  $value    The string or list of strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strContains($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strContains = $this->collection
            ->strContains($value, $encoding)
        ;

        return BoolEnum::fromBool($strContains);
    }

    /**
     * Tests if all of the entries contains one of the passed strings.
     *
     * @param mixed  $value    The string or list of strings to search for in each entry
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strContainsAll($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strContainsAll = $this->collection
            ->strContainsAll($value, $encoding)
        ;

        return BoolEnum::fromBool($strContainsAll);
    }

    /**
     * Tests if at least one of the entries ends with one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value    The string or strings to search for in each entry
     * @param string                        $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strEnds($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strEnds = $this->collection
            ->strEnds($value, $encoding)
        ;

        return BoolEnum::fromBool($strEnds);
    }

    /**
     * Tests if all of the entries ends with at least one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value    The string or strings to search for in each entry
     * @param string                        $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strEndsAll($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strEndsAll = $this->collection
            ->strEndsAll($value, $encoding)
        ;

        return BoolEnum::fromBool($strEndsAll);
    }

    /**
     * Tests if at least one of the entries starts with at least one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value    The string or strings to search for in each entry
     * @param string                        $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strStarts($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strStarts = $this->collection
            ->strStarts($value, $encoding)
        ;

        return BoolEnum::fromBool($strStarts);
    }

    /**
     * Tests if all of the entries starts with one of the passed strings.
     *
     * @param array<array-key,mixed>|string $value    The string or strings to search for in each entry
     * @param string                        $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strStartsAll($value, string $encoding = 'UTF-8'): BoolEnum
    {
        $strStartsAll = $this->collection
            ->strStartsAll($value, $encoding)
        ;

        return BoolEnum::fromBool($strStartsAll);
    }

    /**
     * Returns the strings before the passed value.
     *
     * @param string $value    Character or string to search for
     * @param bool   $case     TRUE if search should be case insensitive, FALSE if case-sensitive
     * @param string $encoding Character encoding of the strings, e.g. "UTF-8" (default), "ASCII", "ISO-8859-1", etc.
     *
     * @api
     */
    public function strBefore(string $value, bool $case = false, string $encoding = 'UTF-8'): self
    {
        $strBefore = $this->collection
            ->strBefore($value, $case, $encoding)
        ;

        return new self($strBefore);
    }
}
