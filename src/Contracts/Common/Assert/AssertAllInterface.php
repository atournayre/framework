<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Common\Assert;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AssertAllInterface
{
    /**
     * @throws ThrowableInterface
     */
    public static function allString(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrString(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allStringNotEmpty(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrStringNotEmpty(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allInteger(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrInteger(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allIntegerish(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrIntegerish(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allPositiveInteger(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrPositiveInteger(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allFloat(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrFloat(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNumeric(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrNumeric(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNatural(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrNatural(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allBoolean(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrBoolean(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allScalar(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrScalar(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allObject(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrObject(mixed $value, string $message = ''): void;

    /**
     * @param string|null $type type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     *
     * @throws ThrowableInterface
     */
    public static function allResource(mixed $value, ?string $type = null, string $message = ''): void;

    /**
     * @param string|null $type type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrResource(mixed $value, ?string $type = null, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allIsCallable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrIsCallable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allIsArray(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrIsArray(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allIsArrayAccessible(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrIsArrayAccessible(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allIsCountable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrIsCountable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allIsIterable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrIsIterable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allIsInstanceOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrIsInstanceOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNotInstanceOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrNotInstanceOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @param array<object|string> $classes
     *
     * @throws ThrowableInterface
     */
    public static function allIsInstanceOfAny(mixed $value, array $classes, string $message = ''): void;

    /**
     * @param array<object|string> $classes
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsInstanceOfAny(mixed $value, array $classes, string $message = ''): void;

    /**
     * @param iterable<object|string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allIsAOf(iterable $value, string $class, string $message = ''): void;

    /**
     * @param iterable<object|string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsAOf(iterable $value, string $class, string $message = ''): void;

    /**
     * @param iterable<object|string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allIsNotA(iterable $value, string $class, string $message = ''): void;

    /**
     * @param iterable<object|string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsNotA(iterable $value, string $class, string $message = ''): void;

    /**
     * @param iterable<object|string> $value
     * @param string[]                $classes
     *
     * @throws ThrowableInterface
     */
    public static function allIsAnyOf(iterable $value, array $classes, string $message = ''): void;

    /**
     * @param iterable<object|string|null> $value
     * @param string[]                     $classes
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsAnyOf(mixed $value, array $classes, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allIsEmpty(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrIsEmpty(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNotEmpty(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrNotEmpty(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNull(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNotNull(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allTrue(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrTrue(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allFalse(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrFalse(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNotFalse(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrNotFalse(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allIp(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrIp(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allIpv4(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrIpv4(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allIpv6(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrIpv6(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allEmail(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrEmail(mixed $value, string $message = ''): void;

    /**
     * @param iterable<array<string>> $values
     *
     * @throws ThrowableInterface
     */
    public static function allUniqueValues(iterable $values, string $message = ''): void;

    /**
     * @param iterable<array<string>|null> $values
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrUniqueValues(iterable $values, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allEq(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrEq(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNotEq(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrNotEq(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allSame(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrSame(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNotSame(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrNotSame(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allGreaterThan(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrGreaterThan(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allGreaterThanEq(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrGreaterThanEq(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allLessThan(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrLessThan(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allLessThanEq(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrLessThanEq(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allRange(mixed $value, mixed $min, mixed $max, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrRange(mixed $value, mixed $min, mixed $max, string $message = ''): void;

    /**
     * @param array<string> $values
     *
     * @throws ThrowableInterface
     */
    public static function allOneOf(mixed $value, array $values, string $message = ''): void;

    /**
     * @param array<string> $values
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrOneOf(mixed $value, array $values, string $message = ''): void;

    /**
     * @param array<string> $values
     *
     * @throws ThrowableInterface
     */
    public static function allInArray(mixed $value, array $values, string $message = ''): void;

    /**
     * @param array<string> $values
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrInArray(mixed $value, array $values, string $message = ''): void;

    /**
     * @param iterable<string> $values
     *
     * @throws ThrowableInterface
     */
    public static function allContains(iterable $values, string $subString, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrContains(iterable $value, string $subString, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNotContains(iterable $value, string $subString, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotContains(iterable $value, string $subString, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNotWhitespaceOnly(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotWhitespaceOnly(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allStartsWith(iterable $value, string $prefix, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrStartsWith(iterable $value, string $prefix, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNotStartsWith(iterable $value, string $prefix, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotStartsWith(iterable $value, string $prefix, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allStartsWithLetter(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrStartsWithLetter(mixed $value, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allEndsWith(iterable $value, string $suffix, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrEndsWith(iterable $value, string $suffix, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNotEndsWith(iterable $value, string $suffix, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotEndsWith(iterable $value, string $suffix, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allRegex(iterable $value, string $pattern, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrRegex(iterable $value, string $pattern, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNotRegex(iterable $value, string $pattern, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrNotRegex(iterable $value, string $pattern, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allUnicodeLetters(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrUnicodeLetters(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allAlpha(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrAlpha(mixed $value, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allDigits(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrDigits(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allAlnum(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrAlnum(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allLower(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrLower(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allUpper(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrUpper(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allLength(iterable $value, int $length, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrLength(iterable $value, int $length, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allMinLength(iterable $value, int|float $min, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMinLength(iterable $value, int|float $min, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allMaxLength(iterable $value, int|float $max, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMaxLength(iterable $value, int|float $max, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allLengthBetween(iterable $value, int|float $min, int|float $max, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrLengthBetween(iterable $value, int|float $min, int|float $max, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allFileExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrFileExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allFile(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrFile(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allDirectory(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrDirectory(mixed $value, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allReadable(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrReadable(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allWritable(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrWritable(iterable $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allClassExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrClassExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allSubclassOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrSubclassOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allInterfaceExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrInterfaceExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allImplementsInterface(mixed $value, mixed $interface, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrImplementsInterface(mixed $value, mixed $interface, string $message = ''): void;

    /**
     * @param iterable<string|object> $classOrObject
     *
     * @throws ThrowableInterface
     */
    public static function allPropertyExists(iterable $classOrObject, mixed $property, string $message = ''): void;

    /**
     * @param iterable<string|object|null> $classOrObject
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrPropertyExists(iterable $classOrObject, mixed $property, string $message = ''): void;

    /**
     * @param iterable<string|object> $classOrObject
     *
     * @throws ThrowableInterface
     */
    public static function allPropertyNotExists(iterable $classOrObject, mixed $property, string $message = ''): void;

    /**
     * @param iterable<string|object|null> $classOrObject
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrPropertyNotExists(iterable $classOrObject, mixed $property, string $message = ''): void;

    /**
     * @param iterable<string|object> $classOrObject
     *
     * @throws ThrowableInterface
     */
    public static function allMethodExists(iterable $classOrObject, mixed $method, string $message = ''): void;

    /**
     * @param iterable<string|object|null> $classOrObject
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMethodExists(iterable $classOrObject, mixed $method, string $message = ''): void;

    /**
     * @param iterable<string|object> $classOrObject
     *
     * @throws ThrowableInterface
     */
    public static function allMethodNotExists(iterable $classOrObject, mixed $method, string $message = ''): void;

    /**
     * @param iterable<string|object|null> $classOrObject
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMethodNotExists(iterable $classOrObject, mixed $method, string $message = ''): void;

    /**
     * @param iterable<array<int, mixed>> $array
     *
     * @throws ThrowableInterface
     */
    public static function allKeyExists(iterable $array, string|int $key, string $message = ''): void;

    /**
     * @param iterable<array<int, mixed>|null> $array
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrKeyExists(iterable $array, string|int $key, string $message = ''): void;

    /**
     * @param iterable<array<int, mixed>> $array
     *
     * @throws ThrowableInterface
     */
    public static function allKeyNotExists(iterable $array, string|int $key, string $message = ''): void;

    /**
     * @param iterable<array<int, mixed>|null> $array
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrKeyNotExists(iterable $array, string|int $key, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allValidArrayKey(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function allNullOrValidArrayKey(mixed $value, string $message = ''): void;

    /**
     * @param iterable<\Countable|array<int, mixed>> $array
     *
     * @throws ThrowableInterface
     */
    public static function allCount(iterable $array, int $number, string $message = ''): void;

    /**
     * @param iterable<\Countable|array<int, mixed>|null> $array
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrCount(iterable $array, int $number, string $message = ''): void;

    /**
     * @param iterable<\Countable|array<int, mixed>> $array
     *
     * @throws ThrowableInterface
     */
    public static function allMinCount(iterable $array, int|float $min, string $message = ''): void;

    /**
     * @param iterable<\Countable|array<int, mixed>|null> $array
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMinCount(iterable $array, int|float $min, string $message = ''): void;

    /**
     * @param iterable<\Countable|array<int, mixed>> $array
     *
     * @throws ThrowableInterface
     */
    public static function allMaxCount(iterable $array, int|float $max, string $message = ''): void;

    /**
     * @param iterable<\Countable|array<int, mixed>|null> $array
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrMaxCount(iterable $array, int|float $max, string $message = ''): void;

    /**
     * @param iterable<\Countable|array<int, mixed>> $array
     *
     * @throws ThrowableInterface
     */
    public static function allCountBetween(iterable $array, int|float $min, int|float $max, string $message = ''): void;

    /**
     * @param iterable<\Countable|array<int, mixed>|null> $array
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrCountBetween(iterable $array, int|float $min, int|float $max, string $message = ''): void;

    /**
     * @param array<int, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function allIsList(array $array, string $message = ''): void;

    /**
     * @param array<int, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsList(array $array, string $message = ''): void;

    /**
     * @param array<int, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function allIsNonEmptyList(array $array, string $message = ''): void;

    /**
     * @param array<int, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsNonEmptyList(array $array, string $message = ''): void;

    /**
     * @param array<string, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function allIsMap(array $array, string $message = ''): void;

    /**
     * @param array<string, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsMap(array $array, string $message = ''): void;

    /**
     * @param array<string, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function allIsNonEmptyMap(array $array, string $message = ''): void;

    /**
     * @param array<string, mixed> $array
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrIsNonEmptyMap(array $array, string $message = ''): void;

    /**
     * @param iterable<string> $value
     *
     * @throws ThrowableInterface
     */
    public static function allUuid(iterable $value, string $message = ''): void;

    /**
     * @param iterable<string|null> $value
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrUuid(iterable $value, string $message = ''): void;

    /**
     * @param iterable<\Closure> $expression
     *
     * @throws ThrowableInterface
     */
    public static function allThrows(iterable $expression, string $class = 'Exception', string $message = ''): void;

    /**
     * @param iterable<\Closure|null> $expression
     *
     * @throws ThrowableInterface
     */
    public static function allNullOrThrows(iterable $expression, string $class = 'Exception', string $message = ''): void;

    /**
     * @param array<array-key, mixed> $value
     *
     * @throws ThrowableInterface
     */
    public static function allIsType(array $value, string $type, string $message = ''): void;
}
