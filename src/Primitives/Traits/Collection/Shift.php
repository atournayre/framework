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
    public function shift()
    {
        return $this->collection->shift();
    }
}
