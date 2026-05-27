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
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final class Assert implements AssertInterface, AssertStringInterface, AssertNumericInterface, AssertMiscInterface, AssertAllInterface, AssertIsInterface, AssertNotInterface, AssertNullInterface
{
    /**
     * @param array<T> $array
     *
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isType(mixed $value, string $type, string $message = ''): void
    {
        $primitive = Primitive::tryFrom($type);

        if (!$primitive instanceof Primitive) {
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
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
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

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allString(mixed $value, string $message = ''): void
    {
        self::__callStatic('allString', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrString(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrString', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allStringNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allStringNotEmpty', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrStringNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrStringNotEmpty', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('allInteger', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrInteger', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIntegerish(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIntegerish', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIntegerish(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIntegerish', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allPositiveInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('allPositiveInteger', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrPositiveInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrPositiveInteger', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allFloat(mixed $value, string $message = ''): void
    {
        self::__callStatic('allFloat', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrFloat(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrFloat', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNumeric(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNumeric', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNumeric(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrNumeric', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNatural(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNatural', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNatural(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrNatural', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allBoolean(mixed $value, string $message = ''): void
    {
        self::__callStatic('allBoolean', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrBoolean(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrBoolean', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allScalar(mixed $value, string $message = ''): void
    {
        self::__callStatic('allScalar', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrScalar(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrScalar', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allObject(mixed $value, string $message = ''): void
    {
        self::__callStatic('allObject', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrObject(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrObject', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allResource(mixed $value, ?string $type = null, string $message = ''): void
    {
        self::__callStatic('allResource', [$value, $type, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrResource(mixed $value, ?string $type = null, string $message = ''): void
    {
        self::__callStatic('allNullOrResource', [$value, $type, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsCallable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsCallable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsCallable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsCallable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsArray(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsArray', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsArray(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsArray', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsArrayAccessible(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsArrayAccessible', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsArrayAccessible(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsArrayAccessible', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsCountable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsCountable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsCountable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsCountable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsIterable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsIterable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsIterable(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsIterable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allIsInstanceOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allNullOrIsInstanceOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNotInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allNotInstanceOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNotInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allNullOrNotInstanceOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsInstanceOfAny(mixed $value, array $classes, string $message = ''): void
    {
        self::__callStatic('allIsInstanceOfAny', [$value, $classes, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsInstanceOfAny(mixed $value, array $classes, string $message = ''): void
    {
        self::__callStatic('allNullOrIsInstanceOfAny', [$value, $classes, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsAOf(iterable $value, string $class, string $message = ''): void
    {
        self::__callStatic('allIsAOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsAOf(iterable $value, string $class, string $message = ''): void
    {
        self::__callStatic('allNullOrIsAOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsNotA(iterable $value, string $class, string $message = ''): void
    {
        self::__callStatic('allIsNotA', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsNotA(iterable $value, string $class, string $message = ''): void
    {
        self::__callStatic('allNullOrIsNotA', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsAnyOf(iterable $value, array $classes, string $message = ''): void
    {
        self::__callStatic('allIsAnyOf', [$value, $classes, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsAnyOf(mixed $value, array $classes, string $message = ''): void
    {
        self::__callStatic('allNullOrIsAnyOf', [$value, $classes, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIsEmpty', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIsEmpty', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNotEmpty', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrNotEmpty', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNull(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNull', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNotNull(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNotNull', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allTrue(mixed $value, string $message = ''): void
    {
        self::__callStatic('allTrue', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrTrue(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrTrue', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('allFalse', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrFalse', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNotFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNotFalse', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNotFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrNotFalse', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIp(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIp', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIp(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIp', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIpv4(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIpv4', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIpv4(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIpv4', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIpv6(mixed $value, string $message = ''): void
    {
        self::__callStatic('allIpv6', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIpv6(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrIpv6', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allEmail(mixed $value, string $message = ''): void
    {
        self::__callStatic('allEmail', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrEmail(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrEmail', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allUniqueValues(iterable $values, string $message = ''): void
    {
        self::__callStatic('allUniqueValues', [$values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrUniqueValues(iterable $values, string $message = ''): void
    {
        self::__callStatic('allNullOrUniqueValues', [$values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allEq', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNullOrEq', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNotEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNotEq', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNotEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNullOrNotEq', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allSame', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNullOrSame', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNotSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNotSame', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNotSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('allNullOrNotSame', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allGreaterThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allGreaterThan', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrGreaterThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allNullOrGreaterThan', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allGreaterThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allGreaterThanEq', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrGreaterThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allNullOrGreaterThanEq', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allLessThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allLessThan', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrLessThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allNullOrLessThan', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allLessThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allLessThanEq', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrLessThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('allNullOrLessThanEq', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allRange(mixed $value, mixed $min, mixed $max, string $message = ''): void
    {
        self::__callStatic('allRange', [$value, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrRange(mixed $value, mixed $min, mixed $max, string $message = ''): void
    {
        self::__callStatic('allNullOrRange', [$value, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allOneOf(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('allOneOf', [$value, $values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrOneOf(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('allNullOrOneOf', [$value, $values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allInArray(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('allInArray', [$value, $values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrInArray(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('allNullOrInArray', [$value, $values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allContains(iterable $values, string $subString, string $message = ''): void
    {
        self::__callStatic('allContains', [$values, $subString, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrContains(iterable $value, string $subString, string $message = ''): void
    {
        self::__callStatic('allNullOrContains', [$value, $subString, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNotContains(iterable $value, string $subString, string $message = ''): void
    {
        self::__callStatic('allNotContains', [$value, $subString, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNotContains(iterable $value, string $subString, string $message = ''): void
    {
        self::__callStatic('allNullOrNotContains', [$value, $subString, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNotWhitespaceOnly(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNotWhitespaceOnly', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNotWhitespaceOnly(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrNotWhitespaceOnly', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allStartsWith(iterable $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('allStartsWith', [$value, $prefix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrStartsWith(iterable $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('allNullOrStartsWith', [$value, $prefix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNotStartsWith(iterable $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('allNotStartsWith', [$value, $prefix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNotStartsWith(iterable $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('allNullOrNotStartsWith', [$value, $prefix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allStartsWithLetter(mixed $value, string $message = ''): void
    {
        self::__callStatic('allStartsWithLetter', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrStartsWithLetter(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrStartsWithLetter', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allEndsWith(iterable $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('allEndsWith', [$value, $suffix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrEndsWith(iterable $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('allNullOrEndsWith', [$value, $suffix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNotEndsWith(iterable $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('allNotEndsWith', [$value, $suffix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNotEndsWith(iterable $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('allNullOrNotEndsWith', [$value, $suffix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allRegex(iterable $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('allRegex', [$value, $pattern, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrRegex(iterable $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('allNullOrRegex', [$value, $pattern, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNotRegex(iterable $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('allNotRegex', [$value, $pattern, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrNotRegex(iterable $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('allNullOrNotRegex', [$value, $pattern, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allUnicodeLetters(mixed $value, string $message = ''): void
    {
        self::__callStatic('allUnicodeLetters', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrUnicodeLetters(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrUnicodeLetters', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allAlpha(mixed $value, string $message = ''): void
    {
        self::__callStatic('allAlpha', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrAlpha(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrAlpha', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allDigits(iterable $value, string $message = ''): void
    {
        self::__callStatic('allDigits', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrDigits(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrDigits', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allAlnum(iterable $value, string $message = ''): void
    {
        self::__callStatic('allAlnum', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrAlnum(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrAlnum', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allLower(iterable $value, string $message = ''): void
    {
        self::__callStatic('allLower', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrLower(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrLower', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allUpper(iterable $value, string $message = ''): void
    {
        self::__callStatic('allUpper', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrUpper(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrUpper', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allLength(iterable $value, int $length, string $message = ''): void
    {
        self::__callStatic('allLength', [$value, $length, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrLength(iterable $value, int $length, string $message = ''): void
    {
        self::__callStatic('allNullOrLength', [$value, $length, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allMinLength(iterable $value, float|int $min, string $message = ''): void
    {
        self::__callStatic('allMinLength', [$value, $min, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrMinLength(iterable $value, float|int $min, string $message = ''): void
    {
        self::__callStatic('allNullOrMinLength', [$value, $min, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allMaxLength(iterable $value, float|int $max, string $message = ''): void
    {
        self::__callStatic('allMaxLength', [$value, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrMaxLength(iterable $value, float|int $max, string $message = ''): void
    {
        self::__callStatic('allNullOrMaxLength', [$value, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allLengthBetween(iterable $value, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('allLengthBetween', [$value, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrLengthBetween(iterable $value, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('allNullOrLengthBetween', [$value, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allFileExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allFileExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrFileExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrFileExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allFile(mixed $value, string $message = ''): void
    {
        self::__callStatic('allFile', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrFile(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrFile', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allDirectory(mixed $value, string $message = ''): void
    {
        self::__callStatic('allDirectory', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrDirectory(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrDirectory', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allReadable(iterable $value, string $message = ''): void
    {
        self::__callStatic('allReadable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrReadable(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrReadable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allWritable(iterable $value, string $message = ''): void
    {
        self::__callStatic('allWritable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrWritable(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrWritable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allClassExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allClassExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrClassExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrClassExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allSubclassOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allSubclassOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrSubclassOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('allNullOrSubclassOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allInterfaceExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allInterfaceExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrInterfaceExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrInterfaceExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allImplementsInterface(mixed $value, mixed $interface, string $message = ''): void
    {
        self::__callStatic('allImplementsInterface', [$value, $interface, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrImplementsInterface(mixed $value, mixed $interface, string $message = ''): void
    {
        self::__callStatic('allNullOrImplementsInterface', [$value, $interface, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allPropertyExists(iterable $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('allPropertyExists', [$classOrObject, $property, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrPropertyExists(iterable $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('allNullOrPropertyExists', [$classOrObject, $property, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allPropertyNotExists(iterable $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('allPropertyNotExists', [$classOrObject, $property, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrPropertyNotExists(iterable $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('allNullOrPropertyNotExists', [$classOrObject, $property, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allMethodExists(iterable $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('allMethodExists', [$classOrObject, $method, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrMethodExists(iterable $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('allNullOrMethodExists', [$classOrObject, $method, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allMethodNotExists(iterable $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('allMethodNotExists', [$classOrObject, $method, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrMethodNotExists(iterable $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('allNullOrMethodNotExists', [$classOrObject, $method, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allKeyExists(iterable $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('allKeyExists', [$array, $key, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrKeyExists(iterable $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('allNullOrKeyExists', [$array, $key, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allKeyNotExists(iterable $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('allKeyNotExists', [$array, $key, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrKeyNotExists(iterable $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('allNullOrKeyNotExists', [$array, $key, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allValidArrayKey(mixed $value, string $message = ''): void
    {
        self::__callStatic('allValidArrayKey', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrValidArrayKey(mixed $value, string $message = ''): void
    {
        self::__callStatic('allNullOrValidArrayKey', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allCount(iterable $array, int $number, string $message = ''): void
    {
        self::__callStatic('allCount', [$array, $number, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrCount(iterable $array, int $number, string $message = ''): void
    {
        self::__callStatic('allNullOrCount', [$array, $number, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allMinCount(iterable $array, float|int $min, string $message = ''): void
    {
        self::__callStatic('allMinCount', [$array, $min, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrMinCount(iterable $array, float|int $min, string $message = ''): void
    {
        self::__callStatic('allNullOrMinCount', [$array, $min, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allMaxCount(iterable $array, float|int $max, string $message = ''): void
    {
        self::__callStatic('allMaxCount', [$array, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrMaxCount(iterable $array, float|int $max, string $message = ''): void
    {
        self::__callStatic('allNullOrMaxCount', [$array, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allCountBetween(iterable $array, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('allCountBetween', [$array, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrCountBetween(iterable $array, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('allNullOrCountBetween', [$array, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsList(array $array, string $message = ''): void
    {
        self::__callStatic('allIsList', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsList(array $array, string $message = ''): void
    {
        self::__callStatic('allNullOrIsList', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsNonEmptyList(array $array, string $message = ''): void
    {
        self::__callStatic('allIsNonEmptyList', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsNonEmptyList(array $array, string $message = ''): void
    {
        self::__callStatic('allNullOrIsNonEmptyList', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsMap(array $array, string $message = ''): void
    {
        self::__callStatic('allIsMap', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsMap(array $array, string $message = ''): void
    {
        self::__callStatic('allNullOrIsMap', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allIsNonEmptyMap(array $array, string $message = ''): void
    {
        self::__callStatic('allIsNonEmptyMap', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrIsNonEmptyMap(array $array, string $message = ''): void
    {
        self::__callStatic('allNullOrIsNonEmptyMap', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allUuid(iterable $value, string $message = ''): void
    {
        self::__callStatic('allUuid', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrUuid(iterable $value, string $message = ''): void
    {
        self::__callStatic('allNullOrUuid', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allThrows(iterable $expression, string $class = 'Exception', string $message = ''): void
    {
        self::__callStatic('allThrows', [$expression, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function allNullOrThrows(iterable $expression, string $class = 'Exception', string $message = ''): void
    {
        self::__callStatic('allNullOrThrows', [$expression, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function true(mixed $value, string $message = ''): void
    {
        self::__callStatic('true', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function false(mixed $value, string $message = ''): void
    {
        self::__callStatic('false', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function ip(mixed $value, string $message = ''): void
    {
        self::__callStatic('ip', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function ipv4(mixed $value, string $message = ''): void
    {
        self::__callStatic('ipv4', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function ipv6(mixed $value, string $message = ''): void
    {
        self::__callStatic('ipv6', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function email(mixed $value, string $message = ''): void
    {
        self::__callStatic('email', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function uniqueValues(array $values, string $message = ''): void
    {
        self::__callStatic('uniqueValues', [$values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function eq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('eq', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function same(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('same', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function greaterThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('greaterThan', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function greaterThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('greaterThanEq', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function lessThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('lessThan', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function lessThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('lessThanEq', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function range(mixed $value, mixed $min, mixed $max, string $message = ''): void
    {
        self::__callStatic('range', [$value, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function oneOf(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('oneOf', [$value, $values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function inArray(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('inArray', [$value, $values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function contains(string $value, string $subString, string $message = ''): void
    {
        self::__callStatic('contains', [$value, $subString, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function startsWith(string $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('startsWith', [$value, $prefix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function startsWithLetter(mixed $value, string $message = ''): void
    {
        self::__callStatic('startsWithLetter', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function endsWith(string $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('endsWith', [$value, $suffix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function regex(string $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('regex', [$value, $pattern, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function unicodeLetters(mixed $value, string $message = ''): void
    {
        self::__callStatic('unicodeLetters', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function alpha(mixed $value, string $message = ''): void
    {
        self::__callStatic('alpha', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function digits(string $value, string $message = ''): void
    {
        self::__callStatic('digits', [$value, $message = '']);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function alnum(string $value, string $message = ''): void
    {
        self::__callStatic('alnum', [$value, $message = '']);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function lower(string $value, string $message = ''): void
    {
        self::__callStatic('lower', [$value, $message = '']);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function upper(string $value, string $message = ''): void
    {
        self::__callStatic('upper', [$value, $message = '']);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function length(string $value, int $length, string $message = ''): void
    {
        self::__callStatic('length', [$value, $length, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function minLength(string $value, float|int $min, string $message = ''): void
    {
        self::__callStatic('minLength', [$value, $min, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function maxLength(string $value, float|int $max, string $message = ''): void
    {
        self::__callStatic('maxLength', [$value, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function lengthBetween(string $value, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('lengthBetween', [$value, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function fileExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('fileExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function file(mixed $value, string $message = ''): void
    {
        self::__callStatic('file', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function directory(mixed $value, string $message = ''): void
    {
        self::__callStatic('directory', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function readable(string $value, string $message = ''): void
    {
        self::__callStatic('readable', [$value, $message = '']);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function writable(string $value, string $message = ''): void
    {
        self::__callStatic('writable', [$value, $message = '']);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function classExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('classExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function subclassOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('subclassOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function interfaceExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('interfaceExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function implementsInterface(mixed $value, mixed $interface, string $message = ''): void
    {
        self::__callStatic('implementsInterface', [$value, $interface, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function propertyExists(object|string $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('propertyExists', [$classOrObject, $property, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function propertyNotExists(object|string $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('propertyNotExists', [$classOrObject, $property, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function methodExists(object|string $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('methodExists', [$classOrObject, $method, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function methodNotExists(object|string $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('methodNotExists', [$classOrObject, $method, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function keyExists(array $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('keyExists', [$array, $key, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function keyNotExists(array $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('keyNotExists', [$array, $key, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function validArrayKey(mixed $value, string $message = ''): void
    {
        self::__callStatic('validArrayKey', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function count(\Countable|array $array, int $number, string $message = ''): void
    {
        self::__callStatic('count', [$array, $number, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function minCount(\Countable|array $array, float|int $min, string $message = ''): void
    {
        self::__callStatic('minCount', [$array, $min, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function maxCount(\Countable|array $array, float|int $max, string $message = ''): void
    {
        self::__callStatic('maxCount', [$array, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function countBetween(\Countable|array $array, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('countBetween', [$array, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function uuid(string $value, string $message = ''): void
    {
        self::__callStatic('uuid', [$value, $message = '']);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function throws(\Closure $expression, string $class = 'Exception', string $message = ''): void
    {
        self::__callStatic('throws', [$expression, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isCallable(mixed $value, string $message = ''): void
    {
        self::__callStatic('isCallable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isArray(mixed $value, string $message = ''): void
    {
        self::__callStatic('isArray', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isArrayAccessible(mixed $value, string $message = ''): void
    {
        self::__callStatic('isArrayAccessible', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isCountable(mixed $value, string $message = ''): void
    {
        self::__callStatic('isCountable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isIterable(mixed $value, string $message = ''): void
    {
        self::__callStatic('isIterable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('isInstanceOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isInstanceOfAny(mixed $value, array $classes, string $message = ''): void
    {
        self::__callStatic('isInstanceOfAny', [$value, $classes, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isAOf(object|string $value, string $class, string $message = ''): void
    {
        self::__callStatic('isAOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isNotA(object|string $value, string $class, string $message = ''): void
    {
        self::__callStatic('isNotA', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isAnyOf(object|string $value, array $classes, string $message = ''): void
    {
        self::__callStatic('isAnyOf', [$value, $classes, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('isEmpty', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isList(array $array, string $message = ''): void
    {
        self::__callStatic('isList', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isNonEmptyList(array $array, string $message = ''): void
    {
        self::__callStatic('isNonEmptyList', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isMap(array $array, string $message = ''): void
    {
        self::__callStatic('isMap', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isNonEmptyMap(array $array, string $message = ''): void
    {
        self::__callStatic('isNonEmptyMap', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function boolean(mixed $value, string $message = ''): void
    {
        self::__callStatic('boolean', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function scalar(mixed $value, string $message = ''): void
    {
        self::__callStatic('scalar', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function object(mixed $value, string $message = ''): void
    {
        self::__callStatic('object', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function resource(mixed $value, ?string $type = null, string $message = ''): void
    {
        self::__callStatic('resource', [$value, $type, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function notInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('notInstanceOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function notEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('notEmpty', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function notNull(mixed $value, string $message = ''): void
    {
        self::__callStatic('notNull', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function notFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('notFalse', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function notEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('notEq', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function notSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('notSame', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function notContains(string $value, string $subString, string $message = ''): void
    {
        self::__callStatic('notContains', [$value, $subString, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function notWhitespaceOnly(string $value, string $message = ''): void
    {
        self::__callStatic('notWhitespaceOnly', [$value, $message = '']);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function notStartsWith(string $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('notStartsWith', [$value, $prefix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function notEndsWith(string $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('notEndsWith', [$value, $suffix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function notRegex(string $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('notRegex', [$value, $pattern, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function null(mixed $value, string $message = ''): void
    {
        self::__callStatic('null', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrString(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrString', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrStringNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrStringNotEmpty', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrInteger', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIntegerish(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIntegerish', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrPositiveInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrPositiveInteger', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrFloat(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrFloat', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNumeric(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrNumeric', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNatural(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrNatural', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrBoolean(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrBoolean', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrScalar(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrScalar', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrObject(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrObject', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrResource(mixed $value, ?string $type = null, string $message = ''): void
    {
        self::__callStatic('nullOrResource', [$value, $type, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsCallable(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsCallable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsArray(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsArray', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsArrayAccessible(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsArrayAccessible', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsCountable(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsCountable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsIterable(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsIterable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('nullOrIsInstanceOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNotInstanceOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('nullOrNotInstanceOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsInstanceOfAny(mixed $value, array $classes, string $message = ''): void
    {
        self::__callStatic('nullOrIsInstanceOfAny', [$value, $classes, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsAOf(object|string|null $value, string $class, string $message = ''): void
    {
        self::__callStatic('nullOrIsAOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsNotA(object|string|null $value, string $class, string $message = ''): void
    {
        self::__callStatic('nullOrIsNotA', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsAnyOf(object|string|null $value, array $classes, string $message = ''): void
    {
        self::__callStatic('nullOrIsAnyOf', [$value, $classes, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIsEmpty', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrNotEmpty', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrTrue(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrTrue', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrFalse', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNotFalse(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrNotFalse', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIp(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIp', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIpv4(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIpv4', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIpv6(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrIpv6', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrEmail(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrEmail', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrUniqueValues(?array $values, string $message = ''): void
    {
        self::__callStatic('nullOrUniqueValues', [$values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('nullOrEq', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNotEq(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('nullOrNotEq', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('nullOrSame', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNotSame(mixed $value, mixed $expect, string $message = ''): void
    {
        self::__callStatic('nullOrNotSame', [$value, $expect, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrGreaterThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('nullOrGreaterThan', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrGreaterThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('nullOrGreaterThanEq', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrLessThan(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('nullOrLessThan', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrLessThanEq(mixed $value, mixed $limit, string $message = ''): void
    {
        self::__callStatic('nullOrLessThanEq', [$value, $limit, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrRange(mixed $value, mixed $min, mixed $max, string $message = ''): void
    {
        self::__callStatic('nullOrRange', [$value, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrOneOf(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('nullOrOneOf', [$value, $values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrInArray(mixed $value, array $values, string $message = ''): void
    {
        self::__callStatic('nullOrInArray', [$value, $values, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrContains(?string $value, string $subString, string $message = ''): void
    {
        self::__callStatic('nullOrContains', [$value, $subString, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNotContains(?string $value, string $subString, string $message = ''): void
    {
        self::__callStatic('nullOrNotContains', [$value, $subString, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNotWhitespaceOnly(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrNotWhitespaceOnly', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrStartsWith(?string $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('nullOrStartsWith', [$value, $prefix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNotStartsWith(?string $value, string $prefix, string $message = ''): void
    {
        self::__callStatic('nullOrNotStartsWith', [$value, $prefix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrStartsWithLetter(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrStartsWithLetter', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrEndsWith(?string $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('nullOrEndsWith', [$value, $suffix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNotEndsWith(?string $value, string $suffix, string $message = ''): void
    {
        self::__callStatic('nullOrNotEndsWith', [$value, $suffix, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrRegex(?string $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('nullOrRegex', [$value, $pattern, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrNotRegex(?string $value, string $pattern, string $message = ''): void
    {
        self::__callStatic('nullOrNotRegex', [$value, $pattern, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrUnicodeLetters(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrUnicodeLetters', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrAlpha(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrAlpha', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrDigits(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrDigits', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrAlnum(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrAlnum', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrLower(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrLower', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrUpper(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrUpper', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrLength(?string $value, int $length, string $message = ''): void
    {
        self::__callStatic('nullOrLength', [$value, $length, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrMinLength(?string $value, float|int $min, string $message = ''): void
    {
        self::__callStatic('nullOrMinLength', [$value, $min, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrMaxLength(?string $value, float|int $max, string $message = ''): void
    {
        self::__callStatic('nullOrMaxLength', [$value, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrLengthBetween(?string $value, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('nullOrLengthBetween', [$value, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrFileExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrFileExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrFile(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrFile', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrDirectory(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrDirectory', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrReadable(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrReadable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrWritable(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrWritable', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrClassExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrClassExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrSubclassOf(mixed $value, object|string $class, string $message = ''): void
    {
        self::__callStatic('nullOrSubclassOf', [$value, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrInterfaceExists(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrInterfaceExists', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrImplementsInterface(mixed $value, mixed $interface, string $message = ''): void
    {
        self::__callStatic('nullOrImplementsInterface', [$value, $interface, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrPropertyExists(object|string|null $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('nullOrPropertyExists', [$classOrObject, $property, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrPropertyNotExists(object|string|null $classOrObject, mixed $property, string $message = ''): void
    {
        self::__callStatic('nullOrPropertyNotExists', [$classOrObject, $property, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrMethodExists(object|string|null $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('nullOrMethodExists', [$classOrObject, $method, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrMethodNotExists(object|string|null $classOrObject, mixed $method, string $message = ''): void
    {
        self::__callStatic('nullOrMethodNotExists', [$classOrObject, $method, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrKeyExists(?array $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('nullOrKeyExists', [$array, $key, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrKeyNotExists(iterable $array, int|string $key, string $message = ''): void
    {
        self::__callStatic('nullOrKeyNotExists', [$array, $key, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrValidArrayKey(mixed $value, string $message = ''): void
    {
        self::__callStatic('nullOrValidArrayKey', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrCount(\Countable|array|null $array, int $number, string $message = ''): void
    {
        self::__callStatic('nullOrCount', [$array, $number, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrMinCount(\Countable|array|null $array, float|int $min, string $message = ''): void
    {
        self::__callStatic('nullOrMinCount', [$array, $min, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrMaxCount(\Countable|array|null $array, float|int $max, string $message = ''): void
    {
        self::__callStatic('nullOrMaxCount', [$array, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrCountBetween(\Countable|array|null $array, float|int $min, float|int $max, string $message = ''): void
    {
        self::__callStatic('nullOrCountBetween', [$array, $min, $max, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsList(array $array, string $message = ''): void
    {
        self::__callStatic('nullOrIsList', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsNonEmptyList(array $array, string $message = ''): void
    {
        self::__callStatic('nullOrIsNonEmptyList', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsMap(array $array, string $message = ''): void
    {
        self::__callStatic('nullOrIsMap', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrIsNonEmptyMap(array $array, string $message = ''): void
    {
        self::__callStatic('nullOrIsNonEmptyMap', [$array, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrUuid(?string $value, string $message = ''): void
    {
        self::__callStatic('nullOrUuid', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function nullOrThrows(?\Closure $expression, string $class = 'Exception', string $message = ''): void
    {
        self::__callStatic('nullOrThrows', [$expression, $class, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function integer(mixed $value, string $message = ''): void
    {
        self::__callStatic('integer', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function integerish(mixed $value, string $message = ''): void
    {
        self::__callStatic('integerish', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function positiveInteger(mixed $value, string $message = ''): void
    {
        self::__callStatic('positiveInteger', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function float(mixed $value, string $message = ''): void
    {
        self::__callStatic('float', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function numeric(mixed $value, string $message = ''): void
    {
        self::__callStatic('numeric', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function natural(mixed $value, string $message = ''): void
    {
        self::__callStatic('natural', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function string(mixed $value, string $message = ''): void
    {
        self::__callStatic('string', [$value, $message]);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function stringNotEmpty(mixed $value, string $message = ''): void
    {
        self::__callStatic('stringNotEmpty', [$value, $message]);
    }
}
