<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\FromInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait From.
 *
 * @see FromInterface
 */
trait From
{
    /**
     * Creates a new map from passed elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function from()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
