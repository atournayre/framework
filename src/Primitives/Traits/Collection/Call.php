<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\CallInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Call.
 *
 * @see CallInterface
 */
trait Call
{
    /**
     * Calls the given method on all items.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function call()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
