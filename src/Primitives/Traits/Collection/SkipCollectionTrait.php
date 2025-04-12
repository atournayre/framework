<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\SkipCollectionInterface;

/**
 * Trait SkipCollectionTrait.
 *
 * @see SkipCollectionInterface
 */
trait SkipCollectionTrait
{
    /**
     * Skips the given number of items and return the rest.
     *
     * @param \Closure|int|array<array-key,mixed> $offset Number of items to skip or function($item, $key) returning true for skipped items
     *
     * @api
     */
    public function skip($offset): self
    {
        $skip = $this->collection->skip($offset);

        return self::of($skip);
    }
}
