<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Log\LoggableInterface;

class RuntimeException extends \RuntimeException implements ThrowableInterface, LoggableInterface
{
    use LoggableThrowableTrait;
}
