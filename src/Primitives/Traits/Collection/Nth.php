<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\NthInterface;

/**
 * Trait Nth.
 *
 * @see NthInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Nth
{
    /**
     * Returns every nth element from the map.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function nth(int $step, int $offset = 0): self
    {
        $nth = $this->collection->nth($step, $offset);

        return self::of($nth);
    }
}
