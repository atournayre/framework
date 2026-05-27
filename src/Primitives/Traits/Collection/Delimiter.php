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
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function delimiter()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
