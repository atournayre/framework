<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Common\Assert;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AssertNumericInterface
{
    /**
     * @throws ThrowableInterface
     */
    public static function integer(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function integerish(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function positiveInteger(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function float(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function numeric(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function natural(mixed $value, string $message = ''): void;
}
