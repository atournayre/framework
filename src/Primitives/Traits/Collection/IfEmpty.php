<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\IfEmptyInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait IfEmpty.
 *
 * @see IfEmptyInterface
 */
trait IfEmpty
{
    /**
     * Executes callbacks if the map is empty.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ifEmpty()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
