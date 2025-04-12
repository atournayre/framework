<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\KeysCollectionInterface;

/**
 * Trait KeysCollectionTrait.
 *
 * @see KeysCollectionInterface
 */
trait KeysCollectionTrait
{
    /**
     * Returns all keys.
     *
     * @api
     *
     * @return array-key[]
     */
    public function keys(): array
    {
        return $this->collection->keys()->toArray();
    }
}
