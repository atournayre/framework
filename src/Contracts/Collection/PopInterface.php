<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PopInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface PopInterface
{
    /**
     * Returns and removes the last element.
     *
     * @return mixed Last element of the map or null if empty
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function pop();
}
