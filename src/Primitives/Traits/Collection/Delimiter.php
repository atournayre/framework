<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\DelimiterInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Delimiter.
 *
 * @see DelimiterInterface
 */
trait Delimiter
{
    /**
     * Sets or returns the seperator for paths to multi-dimensional arrays.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function delimiter()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
