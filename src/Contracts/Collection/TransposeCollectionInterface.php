<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface TransposeCollectionInterface.
 */
interface TransposeCollectionInterface
{
    /**
     * Exchanges rows and columns for a two dimensional map.
     *
     * @api
     */
    public function transpose(): self;
}
