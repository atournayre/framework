<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ShiftInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
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
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function shift();
}
