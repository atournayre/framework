<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface DumpInterface.
 */
interface DumpInterface
{
    /**
     * Prints the map content.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function dump(?callable $callback = null): self;
}
