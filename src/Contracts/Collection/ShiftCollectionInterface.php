<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ShiftCollectionInterface.
 */
interface ShiftCollectionInterface
{
    /**
     * Returns and removes the first element.
     *
     * @return mixed|null Value from map or null if not found
     *
     * @api
     */
    public function shift();
}
