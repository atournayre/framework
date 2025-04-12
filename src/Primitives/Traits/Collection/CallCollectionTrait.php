<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\CallCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait CallCollectionTrait.
 *
 * @see CallCollectionInterface
 */
trait CallCollectionTrait
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
