<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\DelimiterCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait DelimiterCollectionTrait.
 *
 * @see DelimiterCollectionInterface
 */
trait DelimiterCollectionTrait
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
