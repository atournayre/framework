<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\PopInterface;

/**
 * Trait Pop.
 *
 * @see PopInterface
 */
trait Pop
{
    /**
     * Returns and removes the last element.
     *
     * @return mixed Last element of the map or null if empty
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function pop()
    {
        return $this->collection->pop();
    }
}
