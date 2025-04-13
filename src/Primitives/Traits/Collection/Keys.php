<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\KeysInterface;

/**
 * Trait Keys.
 *
 * @see KeysInterface
 */
trait Keys
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
