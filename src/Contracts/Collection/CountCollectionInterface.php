<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\Int_;

/**
 * Interface CountCollectionInterface.
 */
interface CountCollectionInterface
{
    /**
     * Returns the total number of elements.
     *
     * @api
     */
    public function count(): Int_;
}
