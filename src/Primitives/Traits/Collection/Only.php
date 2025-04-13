<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\OnlyInterface;

/**
 * Trait Only.
 *
 * @see OnlyInterface
 */
trait Only
{
    /**
     * Returns only those elements specified by the keys.
     *
     * @param iterable<mixed>|array<mixed>|string|int $keys Keys of the elements that should be returned
     *
     * @api
     */
    public function only($keys): self
    {
        $only = $this->collection->only($keys);

        return self::of($only);
    }
}
