<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CollapseCollectionInterface.
 */
interface CollapseCollectionInterface
{
    /**
     * Collapses multi-dimensional elements overwriting elements.
     *
     * @api
     */
    public function collapse(?int $depth = null): self;
}
