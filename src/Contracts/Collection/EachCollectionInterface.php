<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface EachCollectionInterface.
 */
interface EachCollectionInterface
{
    /**
     * Applies a callback to each element.
     *
     * @api
     */
    public function each(\Closure $callback): self;
}
