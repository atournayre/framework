<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface FilterInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface FilterInterface
{
    /**
     * Applies a filter to all elements.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function filter(?callable $callback = null): self;
}
