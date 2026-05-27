<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface EachInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface EachInterface
{
    /**
     * Applies a callback to each element.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function each(\Closure $callback): self;
}
