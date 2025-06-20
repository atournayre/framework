<?php

declare(strict_types=1);

namespace Atournayre\Common\Exception;

use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

class NullException extends \Exception implements ThrowableInterface
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

    /**
     * @api
     */
    public static function null(): self
    {
        return self::new('Empty exception.');
    }

    public function log(LoggerInterface $logger, array $context = []): void
    {
        $logger->exception($this, $context);
    }
}
