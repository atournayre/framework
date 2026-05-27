<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ShiftInterface;

/**
 * Trait Shift.
 *
 * @see ShiftInterface
 */
trait Shift
{
    /**
     * Returns and removes the first element.
     *
     * @return mixed|null Value from map or null if not found
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function shift()
    {
        return $this->collection->shift();
    }
}
