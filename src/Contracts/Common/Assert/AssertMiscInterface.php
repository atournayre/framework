<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Common\Assert;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AssertMiscInterface
{
    /**
     * @throws ThrowableInterface
     */
    public static function boolean(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function scalar(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function object(mixed $value, string $message = ''): void;

    /**
     * @param string|null $type type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
     *
     * @throws ThrowableInterface
     */
    public static function resource(mixed $value, ?string $type = null, string $message = ''): void;
}
