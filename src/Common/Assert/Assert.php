<?php

declare(strict_types=1);

namespace Atournayre\Common\Assert;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Contracts\Common\Assert\AssertAllInterface;
use Atournayre\Contracts\Common\Assert\AssertInterface;
use Atournayre\Contracts\Common\Assert\AssertIsInterface;
use Atournayre\Contracts\Common\Assert\AssertMiscInterface;
use Atournayre\Contracts\Common\Assert\AssertNotInterface;
use Atournayre\Contracts\Common\Assert\AssertNullInterface;
use Atournayre\Contracts\Common\Assert\AssertNumericInterface;
use Atournayre\Contracts\Common\Assert\AssertStringInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Primitive;
use Atournayre\Primitives\StringType;

/**
 * @template T
 */
final class Assert implements AssertInterface, AssertStringInterface, AssertNumericInterface, AssertMiscInterface, AssertAllInterface, AssertIsInterface, AssertNotInterface, AssertNullInterface
{
    /**
     * @param array<T> $array
     *
     * @throws ThrowableInterface
     */
    public static function isListOf(array $array, string $classOrType, string $message = ''): void
    {
        if ('' === $message) {
            $message = \sprintf('Expected list - non-associative array of %s.', $classOrType);
        }

        self::isList($array, $message);

        if (Primitive::tryFrom($classOrType)?->isMixed()->yes() ?? false) {
            return;
        }

        if (Primitive::tryFrom($classOrType)?->isPrimitive()->yes() ?? false) {
            self::allIsType($array, $classOrType, $message);

            return;
        }

        \Webmozart\Assert\Assert::allIsInstanceOf($array, $classOrType, $message);
    }

    /**
     * @param array<T> $array
     *
     * @throws ThrowableInterface
     */
    public static function isMapOf(array $array, string $classOrType, string $message = ''): void
    {
        if ('' === $message) {
            $message = \sprintf('Expected map - associative array with string keys of %s.', $classOrType);
        }

        self::isMap($array, $message);

        if (Primitive::tryFrom($classOrType)?->isMixed()->yes() ?? false) {
            return;
        }

        if (Primitive::tryFrom($classOrType)?->isPrimitive()->yes() ?? false) {
            self::allIsType($array, $classOrType, $message);

            return;
        }

        \Webmozart\Assert\Assert::allIsInstanceOf($array, $classOrType, $message);
    }

    /**
     * @throws ThrowableInterface
     */
    public static function isType(mixed $value, string $type, string $message = ''): void
    {
        $primitive = Primitive::tryFrom($type);

        if (null === $primitive) {
            InvalidArgumentException::new(\sprintf('Invalid type "%s". Expected one of "string", "int", "float", "bool", "array", "object" or "null".', $type))
                ->throw()
            ;
        }

        $primitive->assert(Primitive::tryFrom($type), $value, $message);
    }

    /**
     * @param array<T> $value
     *
     * @throws ThrowableInterface
     */
    public static function allIsType(array $value, string|Primitive $type, string $message = ''): void
    {
        foreach ($value as $element) {
            Assert::isType($element, $type, $message);
        }
    }

    /**
     * @param array<int, mixed> $arguments
     *
     * @throws ThrowableInterface
     */
    public static function __callStatic(mixed $name, array $arguments): void
    {
        $method = StringType::of($name)
            ->prepend(\Webmozart\Assert\Assert::class, '::')
            ->toString()
        ;

        try {
            $method(...$arguments);
        } catch (\Throwable $throwable) {
            InvalidArgumentException::fromThrowable($throwable)->throw();
        }
    }

    public static function allString(mixed $value, string $message = ''): void
    {
        self::__callStatic('allString', [$value, $message]);
    }

    public static function allNullOrString(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrString', [$value, $message]);
    }

    public static function allStringNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allStringNotEmpty', [$value, $message]);
    }

    public static function allNullOrStringNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrStringNotEmpty', [$value, $message]);
    }

    public static function allInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('allInteger', [$value, $message]);
    }

    public static function allNullOrInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrInteger', [$value, $message]);
    }

    public static function allIntegerish(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIntegerish', [$value, $message]);
    }

    public static function allNullOrIntegerish(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIntegerish', [$value, $message]);
    }

    public static function allPositiveInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('allPositiveInteger', [$value, $message]);
    }

    public static function allNullOrPositiveInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrPositiveInteger', [$value, $message]);
    }

    public static function allFloat(mixed $value, string $message = ''): void
    {
        self::__callStatic('allFloat', [$value, $message]);
    }

    public static function allNullOrFloat(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrFloat', [$value, $message]);
    }

    public static function allNumeric(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNumeric', [$value, $message]);
    }

    public static function allNullOrNumeric(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrNumeric', [$value, $message]);
    }

    public static function allNatural(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNatural', [$value, $message]);
    }

    public static function allNullOrNatural(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrNatural', [$value, $message]);
    }

    public static function allBoolean(mixed $value, string $message = ''): void
    {
        self::__callStatic('allBoolean', [$value, $message]);
    }

    public static function allNullOrBoolean(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrBoolean', [$value, $message]);
    }

    public static function allScalar(mixed $value, string $message = ''): void
    {
        self::__callStatic('allScalar', [$value, $message]);
    }

    public static function allNullOrScalar(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrScalar', [$value, $message]);
    }

    public static function allObject(mixed $value, string $message = ''): void
    {
        self::__callStatic('allObject', [$value, $message]);
    }

    public static function allNullOrObject(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrObject', [$value, $message]);
    }

    public static function allResource(mixed $value, ?string $type = null, string $message = ''): void
    {
        self::__callStatic('allResource', [$value, $type, $message]);
    }

    public static function allNullOrResource(mixed $value, ?string $type = null, string $message = ''): void
    {
        self::__callStatic('allNullOrResource', [$value, $type, $message]);
    }

    public static function allIsCallable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsCallable', [$value, $message]);
    }

    public static function allNullOrIsCallable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsCallable', [$value, $message]);
    }

    public static function allIsArray(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsArray', [$value, $message]);
    }

    public static function allNullOrIsArray(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsArray', [$value, $message]);
    }

    public static function allIsArrayAccessible(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsArrayAccessible', [$value, $message]);
    }

    public static function allNullOrIsArrayAccessible(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsArrayAccessible', [$value, $message]);
    }

    public static function allIsCountable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsCountable', [$value, $message]);
    }

    public static function allNullOrIsCountable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsCountable', [$value, $message]);
    }

    public static function allIsIterable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsIterable', [$value, $message]);
    }

    public static function allNullOrIsIterable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsIterable', [$value, $message]);
    }

    public static function allIsInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allIsInstanceOf', [$value, $class, $message]);
    }

    public static function allNullOrIsInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allNullOrIsInstanceOf', [$value, $class, $message]);
    }

    public static function allNotInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allNotInstanceOf', [$value, $class, $message]);
    }

    public static function allNullOrNotInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allNullOrNotInstanceOf', [$value, $class, $message]);
    }

    public static function allIsInstanceOfAny(mixed $value, array $classes, string $message = ''): void
    {
        self::__callStatic('allIsInstanceOfAny', [$value, $classes, $message]);
    }

    public static function allNullOrIsInstanceOfAny(mixed $value, array $classes, string $message = ''): void
    {
        self::__callStatic('allNullOrIsInstanceOfAny', [$value, $classes, $message]);
    }

    public static function allIsAOf(iterable $value, string $class, string $message = ''): void
    {
        self::__callStatic('allIsAOf', [$value, $class, $message]);
    }

    public static function allNullOrIsAOf(iterable $value, string $class, string $message = ''): void
    {
        self::__callStatic('allNullOrIsAOf', [$value, $class, $message]);
    }

    public static function allIsNotA(iterable $value, string $class, string $message = ''): void
    {
        self::__callStatic('allIsNotA', [$value, $class, $message]);
    }

    public static function allNullOrIsNotA(iterable $value, string $class, string $message = ''): void
    {
        self::__callStatic('allNullOrIsNotA', [$value, $class, $message]);
    }

    public static function allIsAnyOf(iterable $value, array $classes, string $message = ''): void
    {
        self::__callStatic('allIsAnyOf', [$value, $classes, $message]);
    }

    public static function allNullOrIsAnyOf(mixed $value, array $classes, string $message = ''): void
    {
        self::__callStatic('allNullOrIsAnyOf', [$value, $classes, $message]);
    }

    public static function allIsEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsEmpty', [$value, $message]);
    }

    public static function allNullOrIsEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsEmpty', [$value, $message]);
    }

    public static function allNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNotEmpty', [$value, $message]);
    }

    public static function allNullOrNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrNotEmpty', [$value, $message]);
    }

    public static function allNull(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNull', [$value, $message]);
    }

    public static function allNotNull(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNotNull', [$value, $message]);
    }

    public static function allTrue(mixed $value, string $message = ''): void
    {
        self::__callStatic('allTrue', [$value, $message]);
    }

    public static function allNullOrTrue(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrTrue', [$value, $message]);
    }

    public static function allFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('allFalse', [$value, $message]);
    }

    public static function allNullOrFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrFalse', [$value, $message]);
    }

    public static function allNotFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNotFalse', [$value, $message]);
    }

    public static function allNullOrNotFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrNotFalse', [$value, $message]);
    }

    public static function allIp(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIp', [$value, $message]);
    }

    public static function allNullOrIp(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIp', [$value, $message]);
    }

    public static function allIpv4(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIpv4', [$value, $message]);
    }

    public static function allNullOrIpv4(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIpv4', [$value, $message]);
    }

    public static function allIpv6(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIpv6', [$value, $message]);
    }

    public static function allNullOrIpv6(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIpv6', [$value, $message]);
    }

    public static function allEmail(mixed $value, string $message = ''): void
    {
        self::__callStatic('allEmail', [$value, $message]);
    }

    public static function allNullOrEmail(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrEmail', [$value, $message]);
    }

    public static function allUniqueValues(iterable $values, string $message = ''): void
    {
        self::__callStatic('allUniqueValues', [$values, $message]);
    }

    public static function allNullOrUniqueValues(iterable $values, string $message = ''): void
    {
        self::__callStatic('allNullOrUniqueValues', [$values, $message]);
    }

    public static function allEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allEq', [$value, $expect, $message]);
    }

    public static function allNullOrEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNullOrEq', [$value, $expect, $message]);
    }

    public static function allNotEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNotEq', [$value, $expect, $message]);
    }

    public static function allNullOrNotEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNullOrNotEq', [$value, $expect, $message]);
    }

    public static function allSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allSame', [$value, $expect, $message]);
    }

    public static function allNullOrSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNullOrSame', [$value, $expect, $message]);
    }

    public static function allNotSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNotSame', [$value, $expect, $message]);
    }

    public static function allNullOrNotSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNullOrNotSame', [$value, $expect, $message]);
    }

    public static function allGreaterThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allGreaterThan', [$value, $limit, $message]);
    }

    public static function allNullOrGreaterThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allNullOrGreaterThan', [$value, $limit, $message]);
    }

    public static function allGreaterThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allGreaterThanEq', [$value, $limit, $message]);
    }

    public static function allNullOrGreaterThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allNullOrGreaterThanEq', [$value, $limit, $message]);
    }

    public static function allLessThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allLessThan', [$value, $limit, $message]);
    }

    public static function allNullOrLessThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allNullOrLessThan', [$value, $limit, $message]);
    }

    public static function allLessThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allLessThanEq', [$value, $limit, $message]);
    }

    public static function allNullOrLessThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allNullOrLessThanEq', [$value, $limit, $message]);
    }

    public static function allRange(mixed $value, mixed $min, mixed $max, string $message = ''): void
    {
        self::__callStatic('allRange', [$value, $min, $max, $message]);
    }

    public static function allNullOrRange(mixed $value, mixed $min, mixed $max, string $message = ''): void
    {
        self::__callStatic('allNullOrRange', [$value, $min, $max, $message]);
    }

    public static function allOneOf(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('allOneOf', [$value, $values, $message]);
    }

    public static function allNullOrOneOf(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('allNullOrOneOf', [$value, $values, $message]);
    }

    public static function allInArray(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('allInArray', [$value, $values, $message]);
    }

    public static function allNullOrInArray(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('allNullOrInArray', [$value, $values, $message]);
    }

    public static function allContains(iterable $values, string $subString, string $message = ''): void
    {
        self::__callStatic('allContains', [$values, $subString, $message]);
    }

    public static function allNullOrContains(iterable $value, string $subString, string $message = ''): void
    {
        self::__callStatic('allNullOrContains', [$value, $subString, $message]);
    }

    public static function allNotContains(iterable $value, string $subString, string $message = ''): void
    {
        self::__callStatic('allNotContains', [$value, $subString, $message]);
    }

    public static function allNullOrNotContains(iterable $value, string $subString, string $message = ''): void
    {
        self::__callStatic('allNullOrNotContains', [$value, $subString, $message]);
    }

    public static function allNotWhitespaceOnly(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNotWhitespaceOnly', [$value, $message]);
    }

    public static function allNullOrNotWhitespaceOnly(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrNotWhitespaceOnly', [$value, $message]);
    }

    public static function allStartsWith(iterable $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('allStartsWith', [$value, $prefix, $message]);
    }

    public static function allNullOrStartsWith(iterable $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('allNullOrStartsWith', [$value, $prefix, $message]);
    }

    public static function allNotStartsWith(iterable $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('allNotStartsWith', [$value, $prefix, $message]);
    }

    public static function allNullOrNotStartsWith(iterable $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('allNullOrNotStartsWith', [$value, $prefix, $message]);
    }

    public static function allStartsWithLetter(mixed $value, string $message = ''): void
    {
        self::__callStatic('allStartsWithLetter', [$value, $message]);
    }

    public static function allNullOrStartsWithLetter(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrStartsWithLetter', [$value, $message]);
    }

    public static function allEndsWith(iterable $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('allEndsWith', [$value, $suffix, $message]);
    }

    public static function allNullOrEndsWith(iterable $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('allNullOrEndsWith', [$value, $suffix, $message]);
    }

    public static function allNotEndsWith(iterable $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('allNotEndsWith', [$value, $suffix, $message]);
    }

    public static function allNullOrNotEndsWith(iterable $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('allNullOrNotEndsWith', [$value, $suffix, $message]);
    }

    public static function allRegex(iterable $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('allRegex', [$value, $pattern, $message]);
    }

    public static function allNullOrRegex(iterable $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('allNullOrRegex', [$value, $pattern, $message]);
    }

    public static function allNotRegex(iterable $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('allNotRegex', [$value, $pattern, $message]);
    }

    public static function allNullOrNotRegex(iterable $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('allNullOrNotRegex', [$value, $pattern, $message]);
    }

    public static function allUnicodeLetters(mixed $value, string $message = ''): void
    {
        self::__callStatic('allUnicodeLetters', [$value, $message]);
    }

    public static function allNullOrUnicodeLetters(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrUnicodeLetters', [$value, $message]);
    }

    public static function allAlpha(mixed $value, string $message = ''): void
    {
        self::__callStatic('allAlpha', [$value, $message]);
    }

    public static function allNullOrAlpha(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrAlpha', [$value, $message]);
    }

    public static function allDigits(iterable $value, string $message = ''): void
    {
        self::__callStatic('allDigits', [$value, $message]);
    }

    public static function allNullOrDigits(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrDigits', [$value, $message]);
    }

    public static function allAlnum(iterable $value, string $message = ''): void
    {
        self::__callStatic('allAlnum', [$value, $message]);
    }

    public static function allNullOrAlnum(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrAlnum', [$value, $message]);
    }

    public static function allLower(iterable $value, string $message = ''): void
    {
        self::__callStatic('allLower', [$value, $message]);
    }

    public static function allNullOrLower(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrLower', [$value, $message]);
    }

    public static function allUpper(iterable $value, string $message = ''): void
    {
        self::__callStatic('allUpper', [$value, $message]);
    }

    public static function allNullOrUpper(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrUpper', [$value, $message]);
    }

    public static function allLength(iterable $value, int $length, string $message = ''): void
    {
        self::__callStatic('allLength', [$value, $length, $message]);
    }

    public static function allNullOrLength(iterable $value, int $length, string $message = ''): void
    {
        self::__callStatic('allNullOrLength', [$value, $length, $message]);
    }

    public static function allMinLength(iterable $value, float|int $min, string $message = ''): void
    {
        self::__callStatic('allMinLength', [$value, $min, $message]);
    }

    public static function allNullOrMinLength(iterable $value, float|int $min, string $message = ''): void
    {
        self::__callStatic('allNullOrMinLength', [$value, $min, $message]);
    }

    public static function allMaxLength(iterable $value, float|int $max, string $message = ''): void
    {
        self::__callStatic('allMaxLength', [$value, $max, $message]);
    }

    public static function allNullOrMaxLength(iterable $value, float|int $max, string $message = ''): void
    {
        self::__callStatic('allNullOrMaxLength', [$value, $max, $message]);
    }

    public static function allLengthBetween(iterable $value, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('allLengthBetween', [$value, $min, $max, $message]);
    }

    public static function allNullOrLengthBetween(iterable $value, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('allNullOrLengthBetween', [$value, $min, $max, $message]);
    }

    public static function allFileExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allFileExists', [$value, $message]);
    }

    public static function allNullOrFileExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrFileExists', [$value, $message]);
    }

    public static function allFile(mixed $value, string $message = ''): void
    {
        self::__callStatic('allFile', [$value, $message]);
    }

    public static function allNullOrFile(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrFile', [$value, $message]);
    }

    public static function allDirectory(mixed $value, string $message = ''): void
    {
        self::__callStatic('allDirectory', [$value, $message]);
    }

    public static function allNullOrDirectory(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrDirectory', [$value, $message]);
    }

    public static function allReadable(iterable $value, string $message = ''): void
    {
        self::__callStatic('allReadable', [$value, $message]);
    }

    public static function allNullOrReadable(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrReadable', [$value, $message]);
    }

    public static function allWritable(iterable $value, string $message = ''): void
    {
        self::__callStatic('allWritable', [$value, $message]);
    }

    public static function allNullOrWritable(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrWritable', [$value, $message]);
    }

    public static function allClassExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allClassExists', [$value, $message]);
    }

    public static function allNullOrClassExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrClassExists', [$value, $message]);
    }

    public static function allSubclassOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allSubclassOf', [$value, $class, $message]);
    }

    public static function allNullOrSubclassOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allNullOrSubclassOf', [$value, $class, $message]);
    }

    public static function allInterfaceExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allInterfaceExists', [$value, $message]);
    }

    public static function allNullOrInterfaceExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrInterfaceExists', [$value, $message]);
    }

    public static function allImplementsInterface(mixed $value, mixed $interface, string $message = ''): void
    {
        self::__callStatic('allImplementsInterface', [$value, $interface, $message]);
    }

    public static function allNullOrImplementsInterface(mixed $value, mixed $interface, string $message = ''): void
    {
        self::__callStatic('allNullOrImplementsInterface', [$value, $interface, $message]);
    }

    public static function allPropertyExists(iterable $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('allPropertyExists', [$classOrObject, $property, $message]);
    }

    public static function allNullOrPropertyExists(iterable $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('allNullOrPropertyExists', [$classOrObject, $property, $message]);
    }

    public static function allPropertyNotExists(iterable $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('allPropertyNotExists', [$classOrObject, $property, $message]);
    }

    public static function allNullOrPropertyNotExists(iterable $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('allNullOrPropertyNotExists', [$classOrObject, $property, $message]);
    }

    public static function allMethodExists(iterable $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('allMethodExists', [$classOrObject, $method, $message]);
    }

    public static function allNullOrMethodExists(iterable $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('allNullOrMethodExists', [$classOrObject, $method, $message]);
    }

    public static function allMethodNotExists(iterable $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('allMethodNotExists', [$classOrObject, $method, $message]);
    }

    public static function allNullOrMethodNotExists(iterable $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('allNullOrMethodNotExists', [$classOrObject, $method, $message]);
    }

    public static function allKeyExists(iterable $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('allKeyExists', [$array, $key, $message]);
    }

    public static function allNullOrKeyExists(iterable $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('allNullOrKeyExists', [$array, $key, $message]);
    }

    public static function allKeyNotExists(iterable $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('allKeyNotExists', [$array, $key, $message]);
    }

    public static function allNullOrKeyNotExists(iterable $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('allNullOrKeyNotExists', [$array, $key, $message]);
    }

    public static function allValidArrayKey(mixed $value, string $message = ''): void
    {
        self::__callStatic('allValidArrayKey', [$value, $message]);
    }

    public static function allNullOrValidArrayKey(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrValidArrayKey', [$value, $message]);
    }

    public static function allCount(iterable $array, int $number, string $message = ''): void
    {
        self::__callStatic('allCount', [$array, $number, $message]);
    }

    public static function allNullOrCount(iterable $array, int $number, string $message = ''): void
    {
        self::__callStatic('allNullOrCount', [$array, $number, $message]);
    }

    public static function allMinCount(iterable $array, float|int $min, string $message = ''): void
    {
        self::__callStatic('allMinCount', [$array, $min, $message]);
    }

    public static function allNullOrMinCount(iterable $array, float|int $min, string $message = ''): void
    {
        self::__callStatic('allNullOrMinCount', [$array, $min, $message]);
    }

    public static function allMaxCount(iterable $array, float|int $max, string $message = ''): void
    {
        self::__callStatic('allMaxCount', [$array, $max, $message]);
    }

    public static function allNullOrMaxCount(iterable $array, float|int $max, string $message = ''): void
    {
        self::__callStatic('allNullOrMaxCount', [$array, $max, $message]);
    }

    public static function allCountBetween(iterable $array, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('allCountBetween', [$array, $min, $max, $message]);
    }

    public static function allNullOrCountBetween(iterable $array, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('allNullOrCountBetween', [$array, $min, $max, $message]);
    }

    public static function allIsList(array $array, string $message = ''): void
    {
        self::__callStatic('allIsList', [$array, $message]);
    }

    public static function allNullOrIsList(array $array, string $message = ''): void
    {
        self::__callStatic('allNullOrIsList', [$array, $message]);
    }

    public static function allIsNonEmptyList(array $array, string $message = ''): void
    {
        self::__callStatic('allIsNonEmptyList', [$array, $message]);
    }

    public static function allNullOrIsNonEmptyList(array $array, string $message = ''): void
    {
        self::__callStatic('allNullOrIsNonEmptyList', [$array, $message]);
    }

    public static function allIsMap(array $array, string $message = ''): void
    {
        self::__callStatic('allIsMap', [$array, $message]);
    }

    public static function allNullOrIsMap(array $array, string $message = ''): void
    {
        self::__callStatic('allNullOrIsMap', [$array, $message]);
    }

    public static function allIsNonEmptyMap(array $array, string $message = ''): void
    {
        self::__callStatic('allIsNonEmptyMap', [$array, $message]);
    }

    public static function allNullOrIsNonEmptyMap(array $array, string $message = ''): void
    {
        self::__callStatic('allNullOrIsNonEmptyMap', [$array, $message]);
    }

    public static function allUuid(iterable $value, string $message = ''): void
    {
        self::__callStatic('allUuid', [$value, $message]);
    }

    public static function allNullOrUuid(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrUuid', [$value, $message]);
    }

    public static function allThrows(iterable $expression, string $class = 'Exception', string $message = ''): void
    {
        self::__callStatic('allThrows', [$expression, $class, $message]);
    }

    public static function allNullOrThrows(iterable $expression, string $class = 'Exception', string $message = ''): void
    {
        self::__callStatic('allNullOrThrows', [$expression, $class, $message]);
    }

    public static function true(mixed $value, string $message = ''): void
    {
        self::__callStatic('true', [$value, $message]);
    }

    public static function false(mixed $value, string $message = ''): void
    {
        self::__callStatic('false', [$value, $message]);
    }

    public static function ip(mixed $value, string $message = ''): void
    {
        self::__callStatic('ip', [$value, $message]);
    }

    public static function ipv4(mixed $value, string $message = ''): void
    {
        self::__callStatic('ipv4', [$value, $message]);
    }

    public static function ipv6(mixed $value, string $message = ''): void
    {
        self::__callStatic('ipv6', [$value, $message]);
    }

    public static function email(mixed $value, string $message = ''): void
    {
        self::__callStatic('email', [$value, $message]);
    }

    public static function uniqueValues(array $values, string $message = ''): void
    {
        self::__callStatic('uniqueValues', [$values, $message]);
    }

    public static function eq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('eq', [$value, $expect, $message]);
    }

    public static function same(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('same', [$value, $expect, $message]);
    }

    public static function greaterThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('greaterThan', [$value, $limit, $message]);
    }

    public static function greaterThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('greaterThanEq', [$value, $limit, $message]);
    }

    public static function lessThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('lessThan', [$value, $limit, $message]);
    }

    public static function lessThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('lessThanEq', [$value, $limit, $message]);
    }

    public static function range(mixed $value, mixed $min, mixed $max, string $message = ''): void
    {
        self::__callStatic('range', [$value, $min, $max, $message]);
    }

    public static function oneOf(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('oneOf', [$value, $values, $message]);
    }

    public static function inArray(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('inArray', [$value, $values, $message]);
    }

    public static function contains(string $value, string $subString, string $message = ''): void
    {
        self::__callStatic('contains', [$value, $subString, $message]);
    }

    public static function startsWith(string $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('startsWith', [$value, $prefix, $message]);
    }

    public static function startsWithLetter(mixed $value, string $message = ''): void
    {
        self::__callStatic('startsWithLetter', [$value, $message]);
    }

    public static function endsWith(string $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('endsWith', [$value, $suffix, $message]);
    }

    public static function regex(string $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('regex', [$value, $pattern, $message]);
    }

    public static function unicodeLetters(mixed $value, string $message = ''): void
    {
        self::__callStatic('unicodeLetters', [$value, $message]);
    }

    public static function alpha(mixed $value, string $message = ''): void
    {
        self::__callStatic('alpha', [$value, $message]);
    }

    public static function digits(string $value, string $message = ''): void
    {
        self::__callStatic('digits', [$value, $message = '']);
    }

    public static function alnum(string $value, string $message = ''): void
    {
        self::__callStatic('alnum', [$value, $message = '']);
    }

    public static function lower(string $value, string $message = ''): void
    {
        self::__callStatic('lower', [$value, $message = '']);
    }

    public static function upper(string $value, string $message = ''): void
    {
        self::__callStatic('upper', [$value, $message = '']);
    }

    public static function length(string $value, int $length, string $message = ''): void
    {
        self::__callStatic('length', [$value, $length, $message]);
    }

    public static function minLength(string $value, float|int $min, string $message = ''): void
    {
        self::__callStatic('minLength', [$value, $min, $message]);
    }

    public static function maxLength(string $value, float|int $max, string $message = ''): void
    {
        self::__callStatic('maxLength', [$value, $max, $message]);
    }

    public static function lengthBetween(string $value, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('lengthBetween', [$value, $min, $max, $message]);
    }

    public static function fileExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('fileExists', [$value, $message]);
    }

    public static function file(mixed $value, string $message = ''): void
    {
        self::__callStatic('file', [$value, $message]);
    }

    public static function directory(mixed $value, string $message = ''): void
    {
        self::__callStatic('directory', [$value, $message]);
    }

    public static function readable(string $value, string $message = ''): void
    {
        self::__callStatic('readable', [$value, $message = '']);
    }

    public static function writable(string $value, string $message = ''): void
    {
        self::__callStatic('writable', [$value, $message = '']);
    }

    public static function classExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('classExists', [$value, $message]);
    }

    public static function subclassOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('subclassOf', [$value, $class, $message]);
    }

    public static function interfaceExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('interfaceExists', [$value, $message]);
    }

    public static function implementsInterface(mixed $value, mixed $interface, string $message = ''): void
    {
        self::__callStatic('implementsInterface', [$value, $interface, $message]);
    }

    public static function propertyExists(object|string $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('propertyExists', [$classOrObject, $property, $message]);
    }

    public static function propertyNotExists(object|string $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('propertyNotExists', [$classOrObject, $property, $message]);
    }

    public static function methodExists(object|string $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('methodExists', [$classOrObject, $method, $message]);
    }

    public static function methodNotExists(object|string $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('methodNotExists', [$classOrObject, $method, $message]);
    }

    public static function keyExists(array $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('keyExists', [$array, $key, $message]);
    }

    public static function keyNotExists(array $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('keyNotExists', [$array, $key, $message]);
    }

    public static function validArrayKey(mixed $value, string $message = ''): void
    {
        self::__callStatic('validArrayKey', [$value, $message]);
    }

    public static function count(\Countable|array $array, int $number, string $message = ''): void
    {
        self::__callStatic('count', [$array, $number, $message]);
    }

    public static function minCount(\Countable|array $array, float|int $min, string $message = ''): void
    {
        self::__callStatic('minCount', [$array, $min, $message]);
    }

    public static function maxCount(\Countable|array $array, float|int $max, string $message = ''): void
    {
        self::__callStatic('maxCount', [$array, $max, $message]);
    }

    public static function countBetween(\Countable|array $array, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('countBetween', [$array, $min, $max, $message]);
    }

    public static function uuid(string $value, string $message = ''): void
    {
        self::__callStatic('uuid', [$value, $message = '']);
    }

    public static function throws(\Closure $expression, string $class = 'Exception', string $message = ''): void
    {
        self::__callStatic('throws', [$expression, $class, $message]);
    }

    public static function isCallable(mixed $value, string $message = ''): void
    {
        self::__callStatic('isCallable', [$value, $message]);
    }

    public static function isArray(mixed $value, string $message = ''): void
    {
        self::__callStatic('isArray', [$value, $message]);
    }

    public static function isArrayAccessible(mixed $value, string $message = ''): void
    {
        self::__callStatic('isArrayAccessible', [$value, $message]);
    }

    public static function isCountable(mixed $value, string $message = ''): void
    {
        self::__callStatic('isCountable', [$value, $message]);
    }

    public static function isIterable(mixed $value, string $message = ''): void
    {
        self::__callStatic('isIterable', [$value, $message]);
    }

    public static function isInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('isInstanceOf', [$value, $class, $message]);
    }

    public static function isInstanceOfAny(mixed $value, array $classes, string $message = ''): void
    {
        self::__callStatic('isInstanceOfAny', [$value, $classes, $message]);
    }

    public static function isAOf(object|string $value, string $class, string $message = ''): void
    {
        self::__callStatic('isAOf', [$value, $class, $message]);
    }

    public static function isNotA(object|string $value, string $class, string $message = ''): void
    {
        self::__callStatic('isNotA', [$value, $class, $message]);
    }

    public static function isAnyOf(object|string $value, array $classes, string $message = ''): void
    {
        self::__callStatic('isAnyOf', [$value, $classes, $message]);
    }

    public static function isEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('isEmpty', [$value, $message]);
    }

    public static function isList(array $array, string $message = ''): void
    {
        self::__callStatic('isList', [$array, $message]);
    }

    public static function isNonEmptyList(array $array, string $message = ''): void
    {
        self::__callStatic('isNonEmptyList', [$array, $message]);
    }

    public static function isMap(array $array, string $message = ''): void
    {
        self::__callStatic('isMap', [$array, $message]);
    }

    public static function isNonEmptyMap(array $array, string $message = ''): void
    {
        self::__callStatic('isNonEmptyMap', [$array, $message]);
    }

    public static function boolean(mixed $value, string $message = ''): void
    {
        self::__callStatic('boolean', [$value, $message]);
    }

    public static function scalar(mixed $value, string $message = ''): void
    {
        self::__callStatic('scalar', [$value, $message]);
    }

    public static function object(mixed $value, string $message = ''): void
    {
        self::__callStatic('object', [$value, $message]);
    }

    public static function resource(mixed $value, ?string $type = null, string $message = ''): void
    {
        self::__callStatic('resource', [$value, $type, $message]);
    }

    public static function notInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('notInstanceOf', [$value, $class, $message]);
    }

    public static function notEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('notEmpty', [$value, $message]);
    }

    public static function notNull(mixed $value, string $message = ''): void
    {
        self::__callStatic('notNull', [$value, $message]);
    }

    public static function notFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('notFalse', [$value, $message]);
    }

    public static function notEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('notEq', [$value, $expect, $message]);
    }

    public static function notSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('notSame', [$value, $expect, $message]);
    }

    public static function notContains(string $value, string $subString, string $message = ''): void
    {
        self::__callStatic('notContains', [$value, $subString, $message]);
    }

    public static function notWhitespaceOnly(string $value, string $message = ''): void
    {
        self::__callStatic('notWhitespaceOnly', [$value, $message = '']);
    }

    public static function notStartsWith(string $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('notStartsWith', [$value, $prefix, $message]);
    }

    public static function notEndsWith(string $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('notEndsWith', [$value, $suffix, $message]);
    }

    public static function notRegex(string $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('notRegex', [$value, $pattern, $message]);
    }

    public static function null(mixed $value, string $message = ''): void
    {
        self::__callStatic('null', [$value, $message]);
    }

    public static function nullOrString(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrString', [$value, $message]);
    }

    public static function nullOrStringNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrStringNotEmpty', [$value, $message]);
    }

    public static function nullOrInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrInteger', [$value, $message]);
    }

    public static function nullOrIntegerish(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIntegerish', [$value, $message]);
    }

    public static function nullOrPositiveInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrPositiveInteger', [$value, $message]);
    }

    public static function nullOrFloat(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrFloat', [$value, $message]);
    }

    public static function nullOrNumeric(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrNumeric', [$value, $message]);
    }

    public static function nullOrNatural(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrNatural', [$value, $message]);
    }

    public static function nullOrBoolean(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrBoolean', [$value, $message]);
    }

    public static function nullOrScalar(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrScalar', [$value, $message]);
    }

    public static function nullOrObject(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrObject', [$value, $message]);
    }

    public static function nullOrResource(mixed $value, ?string $type = null, string $message = ''): void
    {
        self::__callStatic('nullOrResource', [$value, $type, $message]);
    }

    public static function nullOrIsCallable(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsCallable', [$value, $message]);
    }

    public static function nullOrIsArray(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsArray', [$value, $message]);
    }

    public static function nullOrIsArrayAccessible(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsArrayAccessible', [$value, $message]);
    }

    public static function nullOrIsCountable(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsCountable', [$value, $message]);
    }

    public static function nullOrIsIterable(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsIterable', [$value, $message]);
    }

    public static function nullOrIsInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('nullOrIsInstanceOf', [$value, $class, $message]);
    }

    public static function nullOrNotInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('nullOrNotInstanceOf', [$value, $class, $message]);
    }

    public static function nullOrIsInstanceOfAny(mixed $value, array $classes, string $message = ''): void
    {
        self::__callStatic('nullOrIsInstanceOfAny', [$value, $classes, $message]);
    }

    public static function nullOrIsAOf(object|string|null $value, string $class, string $message = ''): void
    {
        self::__callStatic('nullOrIsAOf', [$value, $class, $message]);
    }

    public static function nullOrIsNotA(object|string|null $value, string $class, string $message = ''): void
    {
        self::__callStatic('nullOrIsNotA', [$value, $class, $message]);
    }

    public static function nullOrIsAnyOf(object|string|null $value, array $classes, string $message = ''): void
    {
        self::__callStatic('nullOrIsAnyOf', [$value, $classes, $message]);
    }

    public static function nullOrIsEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsEmpty', [$value, $message]);
    }

    public static function nullOrNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrNotEmpty', [$value, $message]);
    }

    public static function nullOrTrue(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrTrue', [$value, $message]);
    }

    public static function nullOrFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrFalse', [$value, $message]);
    }

    public static function nullOrNotFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrNotFalse', [$value, $message]);
    }

    public static function nullOrIp(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIp', [$value, $message]);
    }

    public static function nullOrIpv4(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIpv4', [$value, $message]);
    }

    public static function nullOrIpv6(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIpv6', [$value, $message]);
    }

    public static function nullOrEmail(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrEmail', [$value, $message]);
    }

    public static function nullOrUniqueValues(?array $values, string $message = ''): void
    {
        self::__callStatic('nullOrUniqueValues', [$values, $message]);
    }

    public static function nullOrEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('nullOrEq', [$value, $expect, $message]);
    }

    public static function nullOrNotEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('nullOrNotEq', [$value, $expect, $message]);
    }

    public static function nullOrSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('nullOrSame', [$value, $expect, $message]);
    }

    public static function nullOrNotSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('nullOrNotSame', [$value, $expect, $message]);
    }

    public static function nullOrGreaterThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('nullOrGreaterThan', [$value, $limit, $message]);
    }

    public static function nullOrGreaterThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('nullOrGreaterThanEq', [$value, $limit, $message]);
    }

    public static function nullOrLessThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('nullOrLessThan', [$value, $limit, $message]);
    }

    public static function nullOrLessThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('nullOrLessThanEq', [$value, $limit, $message]);
    }

    public static function nullOrRange(mixed $value, mixed $min, mixed $max, string $message = ''): void
    {
        self::__callStatic('nullOrRange', [$value, $min, $max, $message]);
    }

    public static function nullOrOneOf(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('nullOrOneOf', [$value, $values, $message]);
    }

    public static function nullOrInArray(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('nullOrInArray', [$value, $values, $message]);
    }

    public static function nullOrContains(?string $value, string $subString, string $message = ''): void
    {
        self::__callStatic('nullOrContains', [$value, $subString, $message]);
    }

    public static function nullOrNotContains(?string $value, string $subString, string $message = ''): void
    {
        self::__callStatic('nullOrNotContains', [$value, $subString, $message]);
    }

    public static function nullOrNotWhitespaceOnly(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrNotWhitespaceOnly', [$value, $message]);
    }

    public static function nullOrStartsWith(?string $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('nullOrStartsWith', [$value, $prefix, $message]);
    }

    public static function nullOrNotStartsWith(?string $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('nullOrNotStartsWith', [$value, $prefix, $message]);
    }

    public static function nullOrStartsWithLetter(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrStartsWithLetter', [$value, $message]);
    }

    public static function nullOrEndsWith(?string $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('nullOrEndsWith', [$value, $suffix, $message]);
    }

    public static function nullOrNotEndsWith(?string $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('nullOrNotEndsWith', [$value, $suffix, $message]);
    }

    public static function nullOrRegex(?string $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('nullOrRegex', [$value, $pattern, $message]);
    }

    public static function nullOrNotRegex(?string $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('nullOrNotRegex', [$value, $pattern, $message]);
    }

    public static function nullOrUnicodeLetters(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrUnicodeLetters', [$value, $message]);
    }

    public static function nullOrAlpha(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrAlpha', [$value, $message]);
    }

    public static function nullOrDigits(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrDigits', [$value, $message]);
    }

    public static function nullOrAlnum(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrAlnum', [$value, $message]);
    }

    public static function nullOrLower(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrLower', [$value, $message]);
    }

    public static function nullOrUpper(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrUpper', [$value, $message]);
    }

    public static function nullOrLength(?string $value, int $length, string $message = ''): void
    {
        self::__callStatic('nullOrLength', [$value, $length, $message]);
    }

    public static function nullOrMinLength(?string $value, float|int $min, string $message = ''): void
    {
        self::__callStatic('nullOrMinLength', [$value, $min, $message]);
    }

    public static function nullOrMaxLength(?string $value, float|int $max, string $message = ''): void
    {
        self::__callStatic('nullOrMaxLength', [$value, $max, $message]);
    }

    public static function nullOrLengthBetween(?string $value, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('nullOrLengthBetween', [$value, $min, $max, $message]);
    }

    public static function nullOrFileExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrFileExists', [$value, $message]);
    }

    public static function nullOrFile(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrFile', [$value, $message]);
    }

    public static function nullOrDirectory(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrDirectory', [$value, $message]);
    }

    public static function nullOrReadable(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrReadable', [$value, $message]);
    }

    public static function nullOrWritable(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrWritable', [$value, $message]);
    }

    public static function nullOrClassExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrClassExists', [$value, $message]);
    }

    public static function nullOrSubclassOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('nullOrSubclassOf', [$value, $class, $message]);
    }

    public static function nullOrInterfaceExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrInterfaceExists', [$value, $message]);
    }

    public static function nullOrImplementsInterface(mixed $value, mixed $interface, string $message = ''): void
    {
        self::__callStatic('nullOrImplementsInterface', [$value, $interface, $message]);
    }

    public static function nullOrPropertyExists(object|string|null $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('nullOrPropertyExists', [$classOrObject, $property, $message]);
    }

    public static function nullOrPropertyNotExists(object|string|null $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('nullOrPropertyNotExists', [$classOrObject, $property, $message]);
    }

    public static function nullOrMethodExists(object|string|null $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('nullOrMethodExists', [$classOrObject, $method, $message]);
    }

    public static function nullOrMethodNotExists(object|string|null $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('nullOrMethodNotExists', [$classOrObject, $method, $message]);
    }

    public static function nullOrKeyExists(?array $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('nullOrKeyExists', [$array, $key, $message]);
    }

    public static function nullOrKeyNotExists(iterable $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('nullOrKeyNotExists', [$array, $key, $message]);
    }

    public static function nullOrValidArrayKey(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrValidArrayKey', [$value, $message]);
    }

    public static function nullOrCount(\Countable|array|null $array, int $number, string $message = ''): void
    {
        self::__callStatic('nullOrCount', [$array, $number, $message]);
    }

    public static function nullOrMinCount(\Countable|array|null $array, float|int $min, string $message = ''): void
    {
        self::__callStatic('nullOrMinCount', [$array, $min, $message]);
    }

    public static function nullOrMaxCount(\Countable|array|null $array, float|int $max, string $message = ''): void
    {
        self::__callStatic('nullOrMaxCount', [$array, $max, $message]);
    }

    public static function nullOrCountBetween(\Countable|array|null $array, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('nullOrCountBetween', [$array, $min, $max, $message]);
    }

    public static function nullOrIsList(array $array, string $message = ''): void
    {
        self::__callStatic('nullOrIsList', [$array, $message]);
    }

    public static function nullOrIsNonEmptyList(array $array, string $message = ''): void
    {
        self::__callStatic('nullOrIsNonEmptyList', [$array, $message]);
    }

    public static function nullOrIsMap(array $array, string $message = ''): void
    {
        self::__callStatic('nullOrIsMap', [$array, $message]);
    }

    public static function nullOrIsNonEmptyMap(array $array, string $message = ''): void
    {
        self::__callStatic('nullOrIsNonEmptyMap', [$array, $message]);
    }

    public static function nullOrUuid(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrUuid', [$value, $message]);
    }

    public static function nullOrThrows(?\Closure $expression, string $class = 'Exception', string $message = ''): void
    {
        self::__callStatic('nullOrThrows', [$expression, $class, $message]);
    }

    public static function integer(mixed $value, string $message = ''): void
    {
        self::__callStatic('integer', [$value, $message]);
    }

    public static function integerish(mixed $value, string $message = ''): void
    {
        self::__callStatic('integerish', [$value, $message]);
    }

    public static function positiveInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('positiveInteger', [$value, $message]);
    }

    public static function float(mixed $value, string $message = ''): void
    {
        self::__callStatic('float', [$value, $message]);
    }

    public static function numeric(mixed $value, string $message = ''): void
    {
        self::__callStatic('numeric', [$value, $message]);
    }

    public static function natural(mixed $value, string $message = ''): void
    {
        self::__callStatic('natural', [$value, $message]);
    }

    public static function string(mixed $value, string $message = ''): void
    {
        self::__callStatic('string', [$value, $message]);
    }

    public static function stringNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('stringNotEmpty', [$value, $message]);
    }
}
