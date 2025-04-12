<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IndexCollectionInterface;

/**
 * Trait IndexCollectionTrait.
 *
 * @see IndexCollectionInterface
 */
trait IndexCollectionTrait
{
    /**
     * Returns the numerical index of the given key.
     *
     * @param \Closure|string|int $value Key to search for or function with (key) parameters return TRUE if key is found
     *
     * @return int|null Position of the found value (zero based) or NULL if not found
     *
     * @api
     */
    public function index($value): ?int
    {
        return $this->collection->index($value);
    }
}
