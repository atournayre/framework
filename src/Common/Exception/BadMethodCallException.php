<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;

class BadMethodCallException extends \BadMethodCallException implements ThrowableInterface
{
    use ThrowableTrait;
}
