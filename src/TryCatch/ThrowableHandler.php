<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\TryCatch\Contracts\ThrowableHandlerInterface;

/**
 * Class ThrowableHandler.
 *
 * Implementation for throwable handlers.
 */
final readonly class ThrowableHandler implements ThrowableHandlerInterface
{
    private function __construct(
        private string   $throwableClass,
        private \Closure $handlerFunction,
    )
    {
    }

    public static function new(
        string   $throwableClass,
        \Closure $handlerFunction,
    ): self
    {
        return new self($throwableClass, $handlerFunction);
    }

    /**
     * {@inheritdoc}
     */
    public function canHandle(\Throwable $throwable): bool
    {
        return $throwable instanceof $this->throwableClass;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(\Throwable $throwable): mixed
    {
        return ($this->handlerFunction)($throwable);
    }
}
