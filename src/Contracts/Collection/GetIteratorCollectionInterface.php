<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface GetIteratorCollectionInterface.
 */
interface GetIteratorCollectionInterface
{
    /**
     * Returns an iterator for the elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function getIterator();
}
