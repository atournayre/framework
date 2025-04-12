<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\UnshiftCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait UnshiftCollectionTrait.
 *
 * @see UnshiftCollectionInterface
 */
trait UnshiftCollectionTrait
{
    /**
     * Adds an element at the beginning.
     *
     * @param mixed           $value Item to add at the beginning
     * @param int|string|null $key   Key for the item or NULL to reindex all numerical keys
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function unshift($value, $key = null): self
    {
        $this->ensureMutable('unshift');
        $unshift = $this->collection->unshift($value, $key);

        return self::of($unshift);
    }
}
