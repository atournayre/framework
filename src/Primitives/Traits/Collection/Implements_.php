<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\UnexpectedValueException;
use Atournayre\Contracts\Collection\ImplementsInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait Implements.
 *
 * @see ImplementsInterface
 */
trait Implements_
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
    public function implements(string $interface, $throw = false): BoolEnum
    {
        try {
            $implements = $this->collection->implements($interface, $throw);

            return BoolEnum::fromBool($implements);
        } catch (\Throwable $throwable) {
            throw UnexpectedValueException::fromThrowable($throwable);
        }
    }
}
