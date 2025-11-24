<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;

class MutableException extends \RuntimeException implements ThrowableInterface, LoggableInterface
{
    use LoggableThrowableTrait;

    public static function becauseMustBeImmutable(): self
    {
        return self::new('Must be immutable.');
    }
}
