<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\KeysInterface;

/**
 * Trait Keys.
 *
 * @see KeysInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
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
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function keys(): array
    {
        return $this->collection->keys()->toArray();
    }
}
