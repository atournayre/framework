<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Common\Assert;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface AssertIsInterface
{
    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isCallable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isArray(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isArrayAccessible(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isCountable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isIterable(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isInstanceOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @param array<object|string> $classes
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isInstanceOfAny(mixed $value, array $classes, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isAOf(object|string $value, string $class, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isNotA(object|string $value, string $class, string $message = ''): void;

    /**
     * @param array<class-string> $classes
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isAnyOf(object|string $value, array $classes, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isEmpty(mixed $value, string $message = ''): void;

    /**
     * @param array<int> $array
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isList(array $array, string $message = ''): void;

    /**
     * @param array<int, mixed> $array
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isNonEmptyList(array $array, string $message = ''): void;

    /**
     * @param array<string> $array
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isMap(array $array, string $message = ''): void;

    /**
     * @param array<string, mixed> $array
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isNonEmptyMap(array $array, string $message = ''): void;

    /**
     * @param array<int, mixed>   $array
     * @param string|class-string $classOrType
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isListOf(array $array, string $classOrType, string $message = ''): void;

    /**
     * @param array<string, mixed> $array
     * @param string|class-string  $classOrType
     *
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isMapOf(array $array, string $classOrType, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function isType(mixed $value, string $type, string $message = ''): void;
}
