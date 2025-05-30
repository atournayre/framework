<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\FilterInterface;

/**
 * Trait Filter.
 *
 * @see FilterInterface
 */
trait Filter
{
    /**
     * Applies a filter to all elements.
     *
     * @api
     */
    public function filter(?callable $callback = null): self
    {
        $filtered = $this->collection->filter($callback);

        return self::of($filtered);
    }
}
