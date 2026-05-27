<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\UasortInterface;

/**
 * Trait Uasort.
 *
 * @see UasortInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Uasort
{
    /**
     * Sorts elements preserving keys using callback.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function uasort(callable $callback): self
    {
        $uasort = $this->collection->uasort($callback);

        return self::of($uasort);
    }
}
