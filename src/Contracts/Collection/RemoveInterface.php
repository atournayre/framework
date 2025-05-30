<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface RemoveInterface.
 */
interface RemoveInterface
{
    /**
     * Removes an element by key.
     *
     * @param iterable<string|int>|array<string|int>|string|int $keys List of keys to remove
     *
     * @api
     */
    public function remove($keys): self;
}
