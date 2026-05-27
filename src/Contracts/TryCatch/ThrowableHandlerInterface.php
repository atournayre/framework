<?php

declare(strict_types=1);

namespace Atournayre\Contracts\TryCatch;

/**
 * Interface ThrowableHandlerInterface.
 *
 * Defines the contract for handling throwables.
 *
 * @template T
 */
interface ThrowableHandlerInterface
{
    /**
     * Checks if the handler can handle the given throwable.
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function canHandle(\Throwable $throwable): bool;

    /**
     * Handles the given throwable.
     *
     * @return T The result of handling the throwable
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function handle(\Throwable $throwable): mixed;
}
