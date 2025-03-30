<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Common\Assert;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AssertInterface
{
    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function string($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function stringNotEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function integer($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function integerish($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function positiveInteger($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function float($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function numeric($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function natural($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function boolean($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function scalar($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function object($value, $message = '');

    /**
     * @param string|null $type    type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     * @param string      $message
     *
     * @throws ThrowableInterface
     */
    public static function resource($value, $type = null, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function isCallable($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function isArray($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     *
     * @deprecated use "isIterable" or "isInstanceOf" instead
     */
    public static function isTraversable($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function isArrayAccessible($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function isCountable($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function isIterable($value, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws ThrowableInterface
     */
    public static function isInstanceOf($value, $class, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws ThrowableInterface
     */
    public static function notInstanceOf($value, $class, $message = '');

    /**
     * @psalm-param array<class-string> $classes
     *
     * @param array<object|string> $classes
     * @param string               $message
     *
     * @throws ThrowableInterface
     */
    public static function isInstanceOfAny($value, array $classes, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param object|string $value
     * @param string        $class
     * @param string        $message
     *
     * @throws ThrowableInterface
     */
    public static function isAOf($value, $class, $message = '');

    /**
     * @psalm-template UnexpectedType of object
     *
     * @psalm-param class-string<UnexpectedType> $class
     *
     * @param object|string $value
     * @param string        $class
     * @param string        $message
     *
     * @throws ThrowableInterface
     */
    public static function isNotA($value, $class, $message = '');

    /**
     * @psalm-param array<class-string> $classes
     *
     * @param object|string $value
     * @param string[]      $classes
     * @param string        $message
     *
     * @throws ThrowableInterface
     */
    public static function isAnyOf($value, array $classes, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function isEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function notEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function null($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function notNull($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function true($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function false($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function notFalse($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function ip($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function ipv4($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function ipv6($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function email($value, $message = '');

    /**
     * Does non strict comparisons on the items, so ['3', 3] will not pass the assertion.
     *
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function uniqueValues(array $values, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function eq($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function notEq($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function same($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function notSame($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function greaterThan($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function greaterThanEq($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function lessThan($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function lessThanEq($value, $limit, $message = '');

    /**
     * Inclusive range, so Assert::(3, 3, 5) passes.
     *
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function range($value, $min, $max, $message = '');

    /**
     * A more human-readable alias of Assert::inArray().
     *
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function oneOf($value, array $values, $message = '');

    /**
     * Does strict comparison, so Assert::inArray(3, ['3']) does not pass the assertion.
     *
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function inArray($value, array $values, $message = '');

    /**
     * @param string $value
     * @param string $subString
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function contains($value, $subString, $message = '');

    /**
     * @param string $value
     * @param string $subString
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function notContains($value, $subString, $message = '');

    /**
     * @param string $value
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function notWhitespaceOnly($value, $message = '');

    /**
     * @param string $value
     * @param string $prefix
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function startsWith($value, $prefix, $message = '');

    /**
     * @param string $value
     * @param string $prefix
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function notStartsWith($value, $prefix, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function startsWithLetter($value, $message = '');

    /**
     * @param string $value
     * @param string $suffix
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function endsWith($value, $suffix, $message = '');

    /**
     * @param string $value
     * @param string $suffix
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function notEndsWith($value, $suffix, $message = '');

    /**
     * @param string $value
     * @param string $pattern
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function regex($value, $pattern, $message = '');

    /**
     * @param string $value
     * @param string $pattern
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function notRegex($value, $pattern, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function unicodeLetters($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function alpha($value, $message = '');

    /**
     * @param string $value
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function digits($value, $message = '');

    /**
     * @param string $value
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function alnum($value, $message = '');

    /**
     * @param string $value
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function lower($value, $message = '');

    /**
     * @param string $value
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function upper($value, $message = '');

    /**
     * @param string $value
     * @param int    $length
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function length($value, $length, $message = '');

    /**
     * Inclusive min.
     *
     * @param string    $value
     * @param int|float $min
     * @param string    $message
     *
     * @throws ThrowableInterface
     */
    public static function minLength($value, $min, $message = '');

    /**
     * Inclusive max.
     *
     * @param string    $value
     * @param int|float $max
     * @param string    $message
     *
     * @throws ThrowableInterface
     */
    public static function maxLength($value, $max, $message = '');

    /**
     * Inclusive , so Assert::lengthBetween('asd', 3, 5); passes the assertion.
     *
     * @param string    $value
     * @param int|float $min
     * @param int|float $max
     * @param string    $message
     *
     * @throws ThrowableInterface
     */
    public static function lengthBetween($value, $min, $max, $message = '');

    /**
     * Will also pass if $value is a directory, use Assert::file() instead if you need to be sure it is a file.
     *
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function fileExists($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function file($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function directory($value, $message = '');

    /**
     * @param string $value
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function readable($value, $message = '');

    /**
     * @param string $value
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function writable($value, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function classExists($value, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @throws ThrowableInterface
     */
    public static function subclassOf($value, $class, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function interfaceExists($value, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $interface
     *
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function implementsInterface($value, $interface, $message = '');

    /**
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param string        $message
     *
     * @throws ThrowableInterface
     */
    public static function propertyExists($classOrObject, $property, $message = '');

    /**
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param string        $message
     *
     * @throws ThrowableInterface
     */
    public static function propertyNotExists($classOrObject, $property, $message = '');

    /**
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param string        $message
     *
     * @throws ThrowableInterface
     */
    public static function methodExists($classOrObject, $method, $message = '');

    /**
     * @psalm-param class-string|object $classOrObject
     *
     * @param string|object $classOrObject
     * @param string        $message
     *
     * @throws ThrowableInterface
     */
    public static function methodNotExists($classOrObject, $method, $message = '');

    /**
     * @param array      $array
     * @param string|int $key
     * @param string     $message
     *
     * @throws ThrowableInterface
     */
    public static function keyExists($array, $key, $message = '');

    /**
     * @param array      $array
     * @param string|int $key
     * @param string     $message
     *
     * @throws ThrowableInterface
     */
    public static function keyNotExists($array, $key, $message = '');

    /**
     * Checks if a value is a valid array key (int or string).
     *
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function validArrayKey($value, $message = '');

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param \Countable|array $array
     * @param int              $number
     * @param string           $message
     *
     * @throws ThrowableInterface
     */
    public static function count($array, $number, $message = '');

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param \Countable|array $array
     * @param int|float        $min
     * @param string           $message
     *
     * @throws ThrowableInterface
     */
    public static function minCount($array, $min, $message = '');

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param \Countable|array $array
     * @param int|float        $max
     * @param string           $message
     *
     * @throws ThrowableInterface
     */
    public static function maxCount($array, $max, $message = '');

    /**
     * Does not check if $array is countable, this can generate a warning on php versions after 7.2.
     *
     * @param \Countable|array $array
     * @param int|float        $min
     * @param int|float        $max
     * @param string           $message
     *
     * @throws ThrowableInterface
     */
    public static function countBetween($array, $min, $max, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function isList($array, $message = '');

    /**
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function isNonEmptyList($array, $message = '');

    /**
     * @psalm-template T
     *
     * @psalm-param mixed|array<T> $array
     *
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function isMap($array, $message = '');

    /**
     * @psalm-template T
     *
     * @psalm-param mixed|array<T> $array
     *
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function isNonEmptyMap($array, $message = '');

    /**
     * @param string $value
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function uuid($value, $message = '');

    /**
     * @psalm-param class-string<\Throwable> $class
     *
     * @param string $class
     * @param string $message
     *
     * @throws ThrowableInterface
     */
    public static function throws(\Closure $expression, $class = 'Exception', $message = '');

    /**
     * @throws \BadMethodCallException
     */
    public static function __callStatic($name, $arguments);

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrString($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allString($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrString($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrStringNotEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allStringNotEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrStringNotEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrInteger($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allInteger($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrInteger($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIntegerish($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIntegerish($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIntegerish($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrPositiveInteger($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allPositiveInteger($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrPositiveInteger($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrFloat($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allFloat($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrFloat($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNumeric($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNumeric($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNumeric($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNatural($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNatural($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNatural($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrBoolean($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allBoolean($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrBoolean($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrScalar($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allScalar($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrScalar($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrObject($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allObject($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrObject($value, $message = '');

    /**
     * @param string|null $type    type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrResource($value, $type = null, $message = '');

    /**
     * @param string|null $type    type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allResource($value, $type = null, $message = '');

    /**
     * @param string|null $type    type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrResource($value, $type = null, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsCallable($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsCallable($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsCallable($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsArray($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsArray($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsArray($value, $message = '');

    /**
     * @deprecated use "isIterable" or "isInstanceOf" instead
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsTraversable($value, $message = '');

    /**
     * @deprecated use "isIterable" or "isInstanceOf" instead
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsTraversable($value, $message = '');

    /**
     * @deprecated use "isIterable" or "isInstanceOf" instead
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsTraversable($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsArrayAccessible($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsArrayAccessible($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsArrayAccessible($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsCountable($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsCountable($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsCountable($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsIterable($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsIterable($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsIterable($value, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsInstanceOf($value, $class, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsInstanceOf($value, $class, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsInstanceOf($value, $class, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNotInstanceOf($value, $class, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNotInstanceOf($value, $class, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotInstanceOf($value, $class, $message = '');

    /**
     * @psalm-param array<class-string> $classes
     *
     * @param array<object|string> $classes
     * @param string               $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsInstanceOfAny($value, $classes, $message = '');

    /**
     * @psalm-param array<class-string> $classes
     *
     * @param array<object|string> $classes
     * @param string               $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsInstanceOfAny($value, $classes, $message = '');

    /**
     * @psalm-param array<class-string> $classes
     *
     * @param array<object|string> $classes
     * @param string               $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsInstanceOfAny($value, $classes, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param object|string|null $value
     * @param string             $class
     * @param string             $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsAOf($value, $class, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param iterable<object|string> $value
     * @param string                  $class
     * @param string                  $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsAOf($value, $class, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param iterable<object|string|null> $value
     * @param string                       $class
     * @param string                       $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsAOf($value, $class, $message = '');

    /**
     * @psalm-template UnexpectedType of object
     *
     * @psalm-param class-string<UnexpectedType> $class
     *
     * @param object|string|null $value
     * @param string             $class
     * @param string             $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsNotA($value, $class, $message = '');

    /**
     * @psalm-template UnexpectedType of object
     *
     * @psalm-param class-string<UnexpectedType> $class
     *
     * @param iterable<object|string> $value
     * @param string                  $class
     * @param string                  $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsNotA($value, $class, $message = '');

    /**
     * @psalm-template UnexpectedType of object
     *
     * @psalm-param class-string<UnexpectedType> $class
     *
     * @param iterable<object|string|null> $value
     * @param string                       $class
     * @param string                       $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsNotA($value, $class, $message = '');

    /**
     * @psalm-param array<class-string> $classes
     *
     * @param object|string|null $value
     * @param string[]           $classes
     * @param string             $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsAnyOf($value, $classes, $message = '');

    /**
     * @psalm-param array<class-string> $classes
     *
     * @param iterable<object|string> $value
     * @param string[]                $classes
     * @param string                  $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsAnyOf($value, $classes, $message = '');

    /**
     * @psalm-param array<class-string> $classes
     *
     * @param iterable<object|string|null> $value
     * @param string[]                     $classes
     * @param string                       $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsAnyOf($value, $classes, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNotEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNotEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotEmpty($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNull($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNotNull($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrTrue($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allTrue($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrTrue($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrFalse($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allFalse($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrFalse($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNotFalse($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNotFalse($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotFalse($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIp($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIp($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIp($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIpv4($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIpv4($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIpv4($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIpv6($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIpv6($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIpv6($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrEmail($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allEmail($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrEmail($value, $message = '');

    /**
     * @param array|null $values
     * @param string     $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrUniqueValues($values, $message = '');

    /**
     * @param iterable<array> $values
     * @param string          $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allUniqueValues($values, $message = '');

    /**
     * @param iterable<array|null> $values
     * @param string               $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrUniqueValues($values, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrEq($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allEq($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrEq($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNotEq($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNotEq($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotEq($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrSame($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allSame($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrSame($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNotSame($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNotSame($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotSame($value, $expect, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrGreaterThan($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allGreaterThan($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrGreaterThan($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrGreaterThanEq($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allGreaterThanEq($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrGreaterThanEq($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrLessThan($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allLessThan($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrLessThan($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrLessThanEq($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allLessThanEq($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrLessThanEq($value, $limit, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrRange($value, $min, $max, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allRange($value, $min, $max, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrRange($value, $min, $max, $message = '');

    /**
     * @param array  $values
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrOneOf($value, $values, $message = '');

    /**
     * @param array  $values
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allOneOf($value, $values, $message = '');

    /**
     * @param array  $values
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrOneOf($value, $values, $message = '');

    /**
     * @param array  $values
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrInArray($value, $values, $message = '');

    /**
     * @param array  $values
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allInArray($value, $values, $message = '');

    /**
     * @param array  $values
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrInArray($value, $values, $message = '');

    /**
     * @param string|null $value
     * @param string      $subString
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrContains($value, $subString, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $subString
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allContains($value, $subString, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $subString
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrContains($value, $subString, $message = '');

    /**
     * @param string|null $value
     * @param string      $subString
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNotContains($value, $subString, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $subString
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNotContains($value, $subString, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $subString
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotContains($value, $subString, $message = '');

    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNotWhitespaceOnly($value, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNotWhitespaceOnly($value, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotWhitespaceOnly($value, $message = '');

    /**
     * @param string|null $value
     * @param string      $prefix
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrStartsWith($value, $prefix, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $prefix
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allStartsWith($value, $prefix, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $prefix
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrStartsWith($value, $prefix, $message = '');

    /**
     * @param string|null $value
     * @param string      $prefix
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNotStartsWith($value, $prefix, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $prefix
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNotStartsWith($value, $prefix, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $prefix
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotStartsWith($value, $prefix, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrStartsWithLetter($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allStartsWithLetter($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrStartsWithLetter($value, $message = '');

    /**
     * @param string|null $value
     * @param string      $suffix
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrEndsWith($value, $suffix, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $suffix
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allEndsWith($value, $suffix, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $suffix
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrEndsWith($value, $suffix, $message = '');

    /**
     * @param string|null $value
     * @param string      $suffix
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNotEndsWith($value, $suffix, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $suffix
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNotEndsWith($value, $suffix, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $suffix
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotEndsWith($value, $suffix, $message = '');

    /**
     * @param string|null $value
     * @param string      $pattern
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrRegex($value, $pattern, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $pattern
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allRegex($value, $pattern, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $pattern
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrRegex($value, $pattern, $message = '');

    /**
     * @param string|null $value
     * @param string      $pattern
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrNotRegex($value, $pattern, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $pattern
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNotRegex($value, $pattern, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $pattern
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotRegex($value, $pattern, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrUnicodeLetters($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allUnicodeLetters($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrUnicodeLetters($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrAlpha($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allAlpha($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrAlpha($value, $message = '');

    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrDigits($value, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allDigits($value, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrDigits($value, $message = '');

    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrAlnum($value, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allAlnum($value, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrAlnum($value, $message = '');

    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrLower($value, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allLower($value, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrLower($value, $message = '');

    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrUpper($value, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allUpper($value, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrUpper($value, $message = '');

    /**
     * @param string|null $value
     * @param int         $length
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrLength($value, $length, $message = '');

    /**
     * @param iterable<string> $value
     * @param int              $length
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allLength($value, $length, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param int                   $length
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrLength($value, $length, $message = '');

    /**
     * @param string|null $value
     * @param int|float   $min
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrMinLength($value, $min, $message = '');

    /**
     * @param iterable<string> $value
     * @param int|float        $min
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allMinLength($value, $min, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param int|float             $min
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMinLength($value, $min, $message = '');

    /**
     * @param string|null $value
     * @param int|float   $max
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrMaxLength($value, $max, $message = '');

    /**
     * @param iterable<string> $value
     * @param int|float        $max
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allMaxLength($value, $max, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param int|float             $max
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMaxLength($value, $max, $message = '');

    /**
     * @param string|null $value
     * @param int|float   $min
     * @param int|float   $max
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrLengthBetween($value, $min, $max, $message = '');

    /**
     * @param iterable<string> $value
     * @param int|float        $min
     * @param int|float        $max
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allLengthBetween($value, $min, $max, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param int|float             $min
     * @param int|float             $max
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrLengthBetween($value, $min, $max, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrFileExists($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allFileExists($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrFileExists($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrFile($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allFile($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrFile($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrDirectory($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allDirectory($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrDirectory($value, $message = '');

    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrReadable($value, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allReadable($value, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrReadable($value, $message = '');

    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrWritable($value, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allWritable($value, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrWritable($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrClassExists($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allClassExists($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrClassExists($value, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrSubclassOf($value, $class, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allSubclassOf($value, $class, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $class
     *
     * @param string|object $class
     * @param string        $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrSubclassOf($value, $class, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrInterfaceExists($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allInterfaceExists($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrInterfaceExists($value, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $interface
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrImplementsInterface($value, $interface, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $interface
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allImplementsInterface($value, $interface, $message = '');

    /**
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $interface
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrImplementsInterface($value, $interface, $message = '');

    /**
     * @psalm-param class-string|object|null $classOrObject
     *
     * @param string|object|null $classOrObject
     * @param string             $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrPropertyExists($classOrObject, $property, $message = '');

    /**
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param string                  $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allPropertyExists($classOrObject, $property, $message = '');

    /**
     * @psalm-param iterable<class-string|object|null> $classOrObject
     *
     * @param iterable<string|object|null> $classOrObject
     * @param string                       $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrPropertyExists($classOrObject, $property, $message = '');

    /**
     * @psalm-param class-string|object|null $classOrObject
     *
     * @param string|object|null $classOrObject
     * @param string             $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrPropertyNotExists($classOrObject, $property, $message = '');

    /**
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param string                  $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allPropertyNotExists($classOrObject, $property, $message = '');

    /**
     * @psalm-param iterable<class-string|object|null> $classOrObject
     *
     * @param iterable<string|object|null> $classOrObject
     * @param string                       $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrPropertyNotExists($classOrObject, $property, $message = '');

    /**
     * @psalm-param class-string|object|null $classOrObject
     *
     * @param string|object|null $classOrObject
     * @param string             $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrMethodExists($classOrObject, $method, $message = '');

    /**
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param string                  $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allMethodExists($classOrObject, $method, $message = '');

    /**
     * @psalm-param iterable<class-string|object|null> $classOrObject
     *
     * @param iterable<string|object|null> $classOrObject
     * @param string                       $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMethodExists($classOrObject, $method, $message = '');

    /**
     * @psalm-param class-string|object|null $classOrObject
     *
     * @param string|object|null $classOrObject
     * @param string             $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrMethodNotExists($classOrObject, $method, $message = '');

    /**
     * @psalm-param iterable<class-string|object> $classOrObject
     *
     * @param iterable<string|object> $classOrObject
     * @param string                  $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allMethodNotExists($classOrObject, $method, $message = '');

    /**
     * @psalm-param iterable<class-string|object|null> $classOrObject
     *
     * @param iterable<string|object|null> $classOrObject
     * @param string                       $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMethodNotExists($classOrObject, $method, $message = '');

    /**
     * @param array|null $array
     * @param string|int $key
     * @param string     $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrKeyExists($array, $key, $message = '');

    /**
     * @param iterable<array> $array
     * @param string|int      $key
     * @param string          $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allKeyExists($array, $key, $message = '');

    /**
     * @param iterable<array|null> $array
     * @param string|int           $key
     * @param string               $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrKeyExists($array, $key, $message = '');

    /**
     * @param array|null $array
     * @param string|int $key
     * @param string     $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrKeyNotExists($array, $key, $message = '');

    /**
     * @param iterable<array> $array
     * @param string|int      $key
     * @param string          $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allKeyNotExists($array, $key, $message = '');

    /**
     * @param iterable<array|null> $array
     * @param string|int           $key
     * @param string               $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrKeyNotExists($array, $key, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrValidArrayKey($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allValidArrayKey($value, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrValidArrayKey($value, $message = '');

    /**
     * @param \Countable|array|null $array
     * @param int                   $number
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrCount($array, $number, $message = '');

    /**
     * @param iterable<\Countable|array> $array
     * @param int                        $number
     * @param string                     $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allCount($array, $number, $message = '');

    /**
     * @param iterable<\Countable|array|null> $array
     * @param int                             $number
     * @param string                          $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrCount($array, $number, $message = '');

    /**
     * @param \Countable|array|null $array
     * @param int|float             $min
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrMinCount($array, $min, $message = '');

    /**
     * @param iterable<\Countable|array> $array
     * @param int|float                  $min
     * @param string                     $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allMinCount($array, $min, $message = '');

    /**
     * @param iterable<\Countable|array|null> $array
     * @param int|float                       $min
     * @param string                          $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMinCount($array, $min, $message = '');

    /**
     * @param \Countable|array|null $array
     * @param int|float             $max
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrMaxCount($array, $max, $message = '');

    /**
     * @param iterable<\Countable|array> $array
     * @param int|float                  $max
     * @param string                     $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allMaxCount($array, $max, $message = '');

    /**
     * @param iterable<\Countable|array|null> $array
     * @param int|float                       $max
     * @param string                          $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMaxCount($array, $max, $message = '');

    /**
     * @param \Countable|array|null $array
     * @param int|float             $min
     * @param int|float             $max
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrCountBetween($array, $min, $max, $message = '');

    /**
     * @param iterable<\Countable|array> $array
     * @param int|float                  $min
     * @param int|float                  $max
     * @param string                     $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allCountBetween($array, $min, $max, $message = '');

    /**
     * @param iterable<\Countable|array|null> $array
     * @param int|float                       $min
     * @param int|float                       $max
     * @param string                          $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrCountBetween($array, $min, $max, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsList($array, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsList($array, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsList($array, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsNonEmptyList($array, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsNonEmptyList($array, $message = '');

    /**
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsNonEmptyList($array, $message = '');

    /**
     * @psalm-template T
     *
     * @psalm-param mixed|array<T>|null $array
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsMap($array, $message = '');

    /**
     * @psalm-template T
     *
     * @psalm-param iterable<mixed|array<T>> $array
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsMap($array, $message = '');

    /**
     * @psalm-template T
     *
     * @psalm-param iterable<mixed|array<T>|null> $array
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsMap($array, $message = '');

    /**
     * @psalm-template T
     *
     * @psalm-param mixed|array<T>|null $array
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsNonEmptyMap($array, $message = '');

    /**
     * @psalm-template T
     *
     * @psalm-param iterable<mixed|array<T>> $array
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allIsNonEmptyMap($array, $message = '');

    /**
     * @psalm-template T
     *
     * @psalm-param iterable<mixed|array<T>|null> $array
     *
     * @param string $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsNonEmptyMap($array, $message = '');

    /**
     * @param string|null $value
     * @param string      $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrUuid($value, $message = '');

    /**
     * @param iterable<string> $value
     * @param string           $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allUuid($value, $message = '');

    /**
     * @param iterable<string|null> $value
     * @param string                $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrUuid($value, $message = '');

    /**
     * @psalm-param class-string<\Throwable> $class
     *
     * @param Closure|null $expression
     * @param string       $class
     * @param string       $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function nullOrThrows($expression, $class = 'Exception', $message = '');

    /**
     * @psalm-param class-string<\Throwable> $class
     *
     * @param iterable<Closure> $expression
     * @param string            $class
     * @param string            $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allThrows($expression, $class = 'Exception', $message = '');

    /**
     * @psalm-param class-string<\Throwable> $class
     *
     * @param iterable<Closure|null> $expression
     * @param string                 $class
     * @param string                 $message
     *
     * @return void
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrThrows($expression, $class = 'Exception', $message = '');

    /**
     * @param array<int, mixed>   $array
     * @param string|class-string $classOrType
     *
     * @throws ThrowableInterface
     */
    public static function isListOf(array $array, string $classOrType, string $message = ''): void;

    /**
     * @param array<string, mixed> $array
     * @param string|class-string  $classOrType
     *
     * @throws ThrowableInterface
     */
    public static function isMapOf(array $array, string $classOrType, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function isType($value, string $type, string $message = ''): void;

    /**
     * @param array<array-key, mixed> $value
     *
     * @throws ThrowableInterface
     */
    public static function allIsType(array $value, string $type, string $message = ''): void;
}
