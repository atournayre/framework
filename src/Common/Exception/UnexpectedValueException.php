<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;

class UnexpectedValueException extends \UnexpectedValueException implements ThrowableInterface
{
    use ThrowableTrait;
}
