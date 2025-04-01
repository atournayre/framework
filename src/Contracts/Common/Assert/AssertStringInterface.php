<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Common\Assert;

use Atournayre\Contracts\Exception\ThrowableInterface;

interface AssertStringInterface
{
    /**
     * @throws ThrowableInterface
     */
    public static function string(mixed $value, string $message = ''): void;

    /**
     * @throws ThrowableInterface
     */
    public static function stringNotEmpty(mixed $value, string $message = ''): void;
}
