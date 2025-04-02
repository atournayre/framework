<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Common\Assert;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AssertNotInterface
{
    /**
     * @throws ThrowableInterface
     */
    public static function notInstanceOf(mixed $value, string|object $class, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function notEmpty(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function notNull(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function notFalse(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function notEq(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function notSame(mixed $value, mixed $expect, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function notContains(string $value, string $subString, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function notWhitespaceOnly(string $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function notStartsWith(string $value, string $prefix, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function notEndsWith(string $value, string $suffix, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function notRegex(string $value, string $pattern, string $message = ''): void;
}
