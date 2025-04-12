<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface DelimiterCollectionInterface.
 */
interface DelimiterCollectionInterface
{
    /**
     * Sets or returns the seperator for paths to multi-dimensional arrays.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function delimiter();
}
