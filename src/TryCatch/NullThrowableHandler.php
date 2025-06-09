<?php

declare(strict_types=1);

namespace Atournayre\TryCatch;

use Atournayre\Contracts\TryCatch\ThrowableHandlerInterface;

/**
 * Class NullThrowableHandler.
 *
 * A null object implementation of ThrowableHandlerInterface.
 * Used when no specific handler is found for a throwable.
 * 
 * @implements ThrowableHandlerInterface<null>
 */
final class NullThrowableHandler implements ThrowableHandlerInterface
{
    private function __construct()
    {
    }

    public static function new(): self
    {
        return new self();
    }

    /**
     * Always returns false as this is a null handler.
     */
    public function canHandle(\Throwable $throwable): bool
    {
        return false;
    }

    /**
     * Does nothing and returns null.
     */
    public function handle(\Throwable $throwable): null
    {
        return null;
    }
}
