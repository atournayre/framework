<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ShiftCollectionInterface;

/**
 * Trait ShiftCollectionTrait.
 *
 * @see ShiftCollectionInterface
 */
trait ShiftCollectionTrait
{
    /**
     * Returns and removes the first element.
     *
     * @return mixed|null Value from map or null if not found
     *
     * @api
     */
    public function shift()
    {
        return $this->collection->shift();
    }
}
