<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\RemoveInterface;

/**
 * Trait Remove.
 *
 * @see RemoveInterface
 */
trait Remove
{
    /**
     * Removes an element by key.
     *
     * @param iterable<string|int>|array<string|int>|string|int $keys List of keys to remove
     *
     * @api
     */
    public function remove($keys): self
    {
        $remove = $this->collection->remove($keys);

        return self::of($remove);
    }
}
