<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\IfEmptyCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait IfEmptyCollectionTrait.
 *
 * @see IfEmptyCollectionInterface
 */
trait IfEmptyCollectionTrait
{
    /**
     * Executes callbacks if the map is empty.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function ifEmpty()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
