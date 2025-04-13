<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ShiftInterface.
 */
interface ShiftInterface
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
