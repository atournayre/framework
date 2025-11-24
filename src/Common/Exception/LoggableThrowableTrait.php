<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

/**
 * Trait combining ThrowableTrait with LoggableInterface implementation.
 *
 * This trait provides both exception functionality (via ThrowableTrait)
 * and loggability (via toLog method). Use this trait when an exception
 * needs to implement both ThrowableInterface and LoggableInterface.
 *
 * @example
 * class MyException extends \Exception implements ThrowableInterface, LoggableInterface
 * {
 *     use LoggableThrowableTrait;
 * }
 */
trait LoggableThrowableTrait
{
    use ThrowableTrait;

    /**
     * Converts the exception to a loggable array format.
     *
     * @return array<string, mixed>
     */
    public function toLog(): array
    {
        return [
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
            'file' => $this->getFile(),
            'line' => $this->getLine(),
            'trace' => $this->getTraceAsString(),
        ];
    }
}
