<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;

class RuntimeException extends \RuntimeException implements ThrowableInterface
{
    use ThrowableTrait;
}
