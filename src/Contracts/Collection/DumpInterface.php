<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface DumpInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface DumpInterface
{
    /**
     * Prints the map content.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function dump(?callable $callback = null): self;
}
