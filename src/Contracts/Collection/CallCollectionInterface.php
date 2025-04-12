<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CallCollectionInterface.
 */
interface CallCollectionInterface
{
    /**
     * Calls the given method on all items.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function call();
}
