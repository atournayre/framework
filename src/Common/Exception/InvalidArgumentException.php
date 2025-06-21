<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;

class InvalidArgumentException extends \InvalidArgumentException implements ThrowableInterface
{
    use ThrowableTrait;
}
