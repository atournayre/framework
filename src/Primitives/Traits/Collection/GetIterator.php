<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\GetIteratorInterface;

/**
 * Trait GetIterator.
 *
 * @see GetIteratorInterface
 */
trait GetIterator
{
    /**
     * Returns an iterator for the elements.
     *
     * @return \Traversable<array-key, mixed>
     *
     * @api
     */
    public function getIterator(): \Traversable
    {
        return $this->collection->getIterator();
    }
}
