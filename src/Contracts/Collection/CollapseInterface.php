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
    public function collapse(?int $depth = null): self;
}
