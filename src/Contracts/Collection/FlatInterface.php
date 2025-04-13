<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface FlatInterface.
 */
interface FlatInterface
{
    /**
     * Flattens multi-dimensional elements without overwriting elements.
     *
     * @api
     */
    public function flat(?int $depth = null): self;
}
