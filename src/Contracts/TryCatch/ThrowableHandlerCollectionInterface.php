<?php

declare(strict_types=1);

namespace Atournayre\Contracts\TryCatch;

use Atournayre\Contracts\Collection\AddInterface;

/**
 * Interface ThrowableHandlerCollectionInterface.
 *
 * Defines the contract for a collection of throwable handlers.
 */
interface ThrowableHandlerCollectionInterface extends AddInterface
{
    /**
     * Finds a handler that can handle the given throwable.
     */
    public function findHandlerFor(\Throwable $throwable): ?ThrowableHandlerInterface;

    /**
     * Checks if the collection has a handler for the given throwable.
     */
    public function hasHandlerFor(\Throwable $throwable): bool;
}
