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

    public static function fromThrowable(\Throwable $throwable): self
    {
        return self::new($throwable->getMessage(), $throwable->getCode())
            ->withPrevious($throwable)
        ;
    }

    public function withPrevious(\Throwable $previous): self
    {
        return new self($this->message, $this->code, $previous);
    }

    /**
     * @throws self
     */
    public function throw(): never
    {
        throw $this;
    }
}
