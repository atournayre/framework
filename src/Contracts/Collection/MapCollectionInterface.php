<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface MapCollectionInterface.
 */
interface MapCollectionInterface
{
    /**
     * Applies a callback to each element and returns the results.
     *
     * @api
     */
    public function map(callable $callback): self;
}
