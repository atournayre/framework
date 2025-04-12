<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\MapCollectionInterface;

/**
 * Trait MapCollectionTrait.
 *
 * @see MapCollectionInterface
 */
trait MapCollectionTrait
{
    /**
     * Applies a callback to each element and returns the results.
     *
     * @api
     */
    public function map(callable $callback): self
    {
        $map = $this->collection->map($callback);

        return self::of($map);
    }
}
