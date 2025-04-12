<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\GetIteratorCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait GetIteratorCollectionTrait.
 *
 * @see GetIteratorCollectionInterface
 */
trait GetIteratorCollectionTrait
{
    /**
     * Returns an iterator for the elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function getIterator()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }
}
