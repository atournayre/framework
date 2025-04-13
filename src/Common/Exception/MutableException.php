<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Exception\ThrowableInterface;

class MutableException extends \RuntimeException implements ThrowableInterface
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
     * @throws ThrowableInterface
     */
    public function throw(): void
    {
        throw $this;
    }

    public static function becauseMustBeImmutable(): self
    {
        return self::new('Must be immutable.');
    }
}
