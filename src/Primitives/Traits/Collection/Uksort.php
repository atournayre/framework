<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\UksortInterface;

/**
 * Trait Uksort.
 *
 * @see UksortInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Uksort
{
    /**
     * Sorts elements by keys using callback.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function uksort(callable $callback): self
    {
        $uksort = $this->collection->uksort($callback);

        return self::of($uksort);
    }
}
