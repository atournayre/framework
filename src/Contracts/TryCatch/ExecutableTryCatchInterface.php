<?php

declare(strict_types=1);

namespace Atournayre\Contracts\TryCatch;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface ExecutableTryCatchInterface.
 *
 * Defines the contract for executing a try-catch block.
 */
interface ExecutableTryCatchInterface
{
    /**
     * Executes the try-catch block and returns the result.
     *
     * @template T
     *
     * @return T The result of the try block execution
     *
     * @throws ThrowableInterface If an exception is thrown and not handled
     */
    public function execute(): mixed;
}
