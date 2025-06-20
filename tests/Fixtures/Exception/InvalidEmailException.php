<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures\Exception;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Class InvalidEmailException.
 *
 * Exception thrown when an email is invalid.
 */
final class InvalidEmailException extends InvalidArgumentException implements ThrowableInterface
{
    public static function new(string $message = '', int $code = 0): self
    {
        return new self('' !== $message ? $message : 'Invalid email address', $code);
    }
}
