<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface RejectInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface RejectInterface
{
    /**
     * Removes all matched elements.
     *
     * @param Closure|mixed $callback Function with (item) parameter which returns TRUE/FALSE or value to compare with
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function reject($callback = true): self;
}
