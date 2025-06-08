<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\Contracts\TryCatch\ThrowableHandlerInterface;

/**
 * Class ThrowableHandler.
 *
 * Implementation for throwable handlers.
 */
final readonly class ThrowableHandler implements ThrowableHandlerInterface
{
    private function __construct(
        private string $throwableClass,
        private \Closure $handlerFunction,
    ) {
    }

    public static function new(
        string $throwableClass,
        \Closure $handlerFunction,
    ): self {
        return new self($throwableClass, $handlerFunction);
    }

    public function canHandle(\Throwable $throwable): bool
    {
        return $throwable instanceof $this->throwableClass;
    }

    public function handle(\Throwable $throwable): mixed
    {
        return ($this->handlerFunction)($throwable);
    }
}
