<?php

declare(strict_types=1);

namespace Atournayre\Contracts\TryCatch;

/**
 * Interface ThrowableHandlerInterface.
 *
 * Defines the contract for handling throwables.
 */
interface ThrowableHandlerInterface
{
    /**
     * Checks if the handler can handle the given throwable.
     */
    public function canHandle(\Throwable $throwable): bool;

    /**
     * Handles the given throwable.
     *
     * @template T
     * @return T The result of handling the throwable
     */
    public function handle(\Throwable $throwable): mixed;
}
