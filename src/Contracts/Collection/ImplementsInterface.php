<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Interface ImplementsInterface.
 */
interface ImplementsInterface
{
    /**
     * Tests if all entries are objects implementing the interface.
     *
     * @param \Throwable|bool|string $throw Passing TRUE or an exception name will throw the exception instead of returning FALSE
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function implements(string $interface, $throw = false): BoolEnum;
}
