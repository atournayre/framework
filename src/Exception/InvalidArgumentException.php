<?php

declare(strict_types=1);

namespace Atournayre\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;

final class InvalidArgumentException extends \InvalidArgumentException implements ThrowableInterface
{
    public static function new(string $message = '', int $code = 0): self
    {
        return new self($message, $code);
    }

    public function withPrevious(\Throwable $previous): self
    {
        return new self($this->message, $this->code, $previous);
    }

    /**
     * @throws self
     */
    public function throw(): void
    {
        throw $this;
    }
}
