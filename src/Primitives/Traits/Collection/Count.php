<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CountInterface;
use Atournayre\Primitives\Int_;

/**
 * Trait Count.
 *
 * @see CountInterface
 */
trait Count
{
    /**
     * Returns the total number of elements.
     *
     * @api
     */
    public function count(): Int_
    {
        $count = $this->collection->count();

        return Int_::of($count);
    }
}
