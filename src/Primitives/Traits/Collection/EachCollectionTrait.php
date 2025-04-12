<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\EachCollectionInterface;

/**
 * Trait EachCollectionTrait.
 *
 * @see EachCollectionInterface
 */
trait EachCollectionTrait
{
    /**
     * Applies a callback to each element.
     *
     * @api
     */
    public function each(\Closure $callback): self
    {
        $collection = $this->collection->each($callback);

        return self::of($collection);
    }
}
