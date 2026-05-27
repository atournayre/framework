<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CountInterface;
use Atournayre\Primitives\Int_;

/**
 * Trait Count.
 *
 * @see CountInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Count
{
    /**
     * Returns the total number of elements.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function count(): Int_
    {
        $count = $this->collection->count();

        return Int_::of($count);
    }
}
