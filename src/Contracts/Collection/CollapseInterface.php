<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CollapseInterface.
 */
interface CollapseInterface
{
    /**
     * Collapses multi-dimensional elements overwriting elements.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function collapse(?int $depth = null): self;
}
