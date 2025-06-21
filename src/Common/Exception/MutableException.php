<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;

class MutableException extends \RuntimeException implements ThrowableInterface
{
    use ThrowableTrait;

    public static function becauseMustBeImmutable(): self
    {
        return self::new('Must be immutable.');
    }
}
