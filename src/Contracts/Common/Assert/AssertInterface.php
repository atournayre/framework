<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Common\Assert;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AssertInterface
{
    /**
     * @throws ThrowableInterface
     */
    public static function true(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function false(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function ip(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function ipv4(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function ipv6(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function email(mixed $value, string $message = ''): void;

    /**
     * Does non strict comparisons on the items, so ['3', 3] will not pass the assertion.
     *
     * @param array<string> $values
     *
     * @throws ThrowableInterface
     */
    public static function uniqueValues(array $values, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function eq(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function same(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function greaterThan(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function greaterThanEq(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function lessThan(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function lessThanEq(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * Inclusive range, so Assert::(3, 3, 5) passes.
     *
     * @throws ThrowableInterface
     */
    public static function range(mixed $value, mixed $min, mixed $max, string $message = ''): void;

    /**
     * A more human-readable alias of Assert::inArray().
     *
     * @param array<string> $values
     *
     * @throws ThrowableInterface
     */
    public static function oneOf(mixed $value, array $values, string $message = ''): void;

    /**
     * Does strict comparison, so Assert::inArray(3, ['3']) does not pass the assertion.
     *
     * @param array<string> $values
     *
     * @throws ThrowableInterface
     */
    public static function inArray(mixed $value, array $values, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function contains(string $value, string $subString, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function startsWith(string $value, string $prefix, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function startsWithLetter(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function endsWith(string $value, string $suffix, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function regex(string $value, string $pattern, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function unicodeLetters(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function alpha(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function digits(string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function alnum(string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function lower(string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function upper(string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function length(string $value, int $length, string $message = ''): void;

    /**
     * Inclusive min.
     *
     * @throws ThrowableInterface
     */
    public static function minLength(string $value, int|float $min, string $message = ''): void;

    /**
     * Inclusive max.
     *
     * @throws ThrowableInterface
     */
    public static function maxLength(string $value, int|float $max, string $message = ''): void;

    /**
     * Inclusive , so Assert::lengthBetween('asd', 3, 5); passes the assertion.
     *
     * @throws ThrowableInterface
     */
    public static function lengthBetween(string $value, int|float $min, int|float $max, string $message = ''): void;

    /**
     * Will also pass if $value is a directory, use Assert::file() instead if you need to be sure it is a file.
     *
     * @throws ThrowableInterface
     */
    public static function fileExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function file(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function directory(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function readable(string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function writable(string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function classExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function subclassOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function interfaceExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function implementsInterface(mixed $value, mixed $interface, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function propertyExists(string|object $classOrObject, mixed $property, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function propertyNotExists(string|object $classOrObject, mixed $property, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function methodExists(string|object $classOrObject, mixed $method, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function methodNotExists(string|object $classOrObject, mixed $method, string $message = ''): void;

    /**
     * @param array<int, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function keyExists(array $array, string|int $key, string $message = ''): void;

    /**
     * @param array<int, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function keyNotExists(array $array, string|int $key, string $message = ''): void;

    /**
     * Checks if a value is a valid array key (int or string).
     *
     * @throws ThrowableInterface
     */
    public static function validArrayKey(mixed $value, string $message = ''): void;

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param \Countable|array<int, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function count(\Countable|array $array, int $number, string $message = ''): void;

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param \Countable|array<int, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function minCount(\Countable|array $array, int|float $min, string $message = ''): void;

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param \Countable|array<int, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function maxCount(\Countable|array $array, int|float $max, string $message = ''): void;

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param \Countable|array<int, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function countBetween(\Countable|array $array, int|float $min, int|float $max, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function uuid(string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function throws(\Closure $expression, string $class = 'Exception', string $message = ''): void;

    /**
     * @param array<int, mixed> $arguments
     *
     * @throws ThrowableInterface
     */
    public static function __callStatic(mixed $name, array $arguments): void;
}
