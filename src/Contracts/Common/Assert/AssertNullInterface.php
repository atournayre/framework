<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Common\Assert;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AssertNullInterface
{
    /**
     * @throws ThrowableInterface
     */
    public static function null(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrString(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrStringNotEmpty(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrInteger(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIntegerish(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrPositiveInteger(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrFloat(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNumeric(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNatural(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrBoolean(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrScalar(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrObject(mixed $value, string $message = ''): void;

    /**
     * @param string|null $type type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     *
     * @throws ThrowableInterface
     */
    public static function nullOrResource(mixed $value, ?string $type = null, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIsCallable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIsArray(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIsArrayAccessible(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIsCountable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIsIterable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIsInstanceOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNotInstanceOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @param array<object|string> $classes
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsInstanceOfAny(mixed $value, array $classes, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIsAOf(object|string|null $value, string $class, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIsNotA(object|string|null $value, string $class, string $message = ''): void;

    /**
     * @param string[] $classes
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsAnyOf(object|string|null $value, array $classes, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIsEmpty(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNotEmpty(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrTrue(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrFalse(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNotFalse(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIp(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIpv4(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrIpv6(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrEmail(mixed $value, string $message = ''): void;

    /**
     * @param array<string> $values
     *
     * @throws ThrowableInterface
     */
    public static function nullOrUniqueValues(?array $values, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrEq(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNotEq(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrSame(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNotSame(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrGreaterThan(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrGreaterThanEq(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrLessThan(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrLessThanEq(mixed $value, mixed $limit, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrRange(mixed $value, mixed $min, mixed $max, string $message = ''): void;

    /**
     * @param array<string> $values
     *
     * @throws ThrowableInterface
     */
    public static function nullOrOneOf(mixed $value, array $values, string $message = ''): void;

    /**
     * @param array<string> $values
     *
     * @throws ThrowableInterface
     */
    public static function nullOrInArray(mixed $value, array $values, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrContains(?string $value, string $subString, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNotContains(?string $value, string $subString, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNotWhitespaceOnly(?string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrStartsWith(?string $value, string $prefix, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNotStartsWith(?string $value, string $prefix, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrStartsWithLetter(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrEndsWith(?string $value, string $suffix, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNotEndsWith(?string $value, string $suffix, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrRegex(?string $value, string $pattern, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrNotRegex(?string $value, string $pattern, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrUnicodeLetters(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrAlpha(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrDigits(?string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrAlnum(?string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrLower(?string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrUpper(?string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrLength(?string $value, int $length, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrMinLength(?string $value, int|float $min, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrMaxLength(?string $value, int|float $max, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrLengthBetween(?string $value, int|float $min, int|float $max, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrFileExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrFile(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrDirectory(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrReadable(?string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrWritable(?string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrClassExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrSubclassOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrInterfaceExists(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrImplementsInterface(mixed $value, mixed $interface, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrPropertyExists(string|object|null $classOrObject, mixed $property, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrPropertyNotExists(string|object|null $classOrObject, mixed $property, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrMethodExists(string|object|null $classOrObject, mixed $method, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrMethodNotExists(string|object|null $classOrObject, mixed $method, string $message = ''): void;

    /**
     * @param array<string>|null $array
     *
     * @throws ThrowableInterface
     */
    public static function nullOrKeyExists(?array $array, string|int $key, string $message = ''): void;

    /**
     * @param iterable<array<string>|null> $array
     *
     * @throws ThrowableInterface
     */
    public static function nullOrKeyNotExists(iterable $array, string|int $key, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrValidArrayKey(mixed $value, string $message = ''): void;

    /**
     * @param \Countable|array<string>|null $array
     *
     * @throws ThrowableInterface
     */
    public static function nullOrCount(\Countable|array|null $array, int $number, string $message = ''): void;

    /**
     * @param \Countable|array<string>|null $array
     *
     * @throws ThrowableInterface
     */
    public static function nullOrMinCount(\Countable|array|null $array, int|float $min, string $message = ''): void;

    /**
     * @param \Countable|array<string>|null $array
     *
     * @throws ThrowableInterface
     */
    public static function nullOrMaxCount(\Countable|array|null $array, int|float $max, string $message = ''): void;

    /**
     * @param \Countable|array<string>|null $array
     *
     * @throws ThrowableInterface
     */
    public static function nullOrCountBetween(\Countable|array|null $array, int|float $min, int|float $max, string $message = ''): void;

    /**
     * @param array<string> $array
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsList(array $array, string $message = ''): void;

    /**
     * @param array<string> $array
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsNonEmptyList(array $array, string $message = ''): void;

    /**
     * @param array<string> $array
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsMap(array $array, string $message = ''): void;

    /**
     * @param array<string> $array
     *
     * @throws ThrowableInterface
     */
    public static function nullOrIsNonEmptyMap(array $array, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrUuid(?string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function nullOrThrows(?\Closure $expression, string $class = 'Exception', string $message = ''): void;
}
