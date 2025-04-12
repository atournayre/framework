<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ClearCollectionInterface.
 */
interface ClearCollectionInterface
{
    /**
     * Removes all elements.
     *
     * @api
     */
    public function clear(): self;
}
