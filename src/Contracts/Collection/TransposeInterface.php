<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface TransposeInterface.
 */
interface TransposeInterface
{
    /**
     * Exchanges rows and columns for a two dimensional map.
     *
     * @api
     */
    public function transpose(): self;
}
