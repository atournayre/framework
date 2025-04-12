<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\PopCollectionInterface;

/**
 * Trait PopCollectionTrait.
 *
 * @see PopCollectionInterface
 */
trait PopCollectionTrait
{
    /**
     * Returns and removes the last element.
     *
     * @return mixed Last element of the map or null if empty
     *
     * @api
     */
    public function pop()
    {
        return $this->collection->pop();
    }
}
