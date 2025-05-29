<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\DdInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Dd.
 *
 * @see DdInterface
 */
trait Dd
{
    /**
     * Prints the map content and terminates the script.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function dd()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
