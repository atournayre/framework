<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\FlatInterface;

/**
 * Trait Flat.
 *
 * @see FlatInterface
 */
trait Flat
{
    /**
     * Flattens multi-dimensional elements without overwriting elements.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function flat(?int $depth = null): self
    {
        $flat = $this->collection->flat($depth);

        return self::of($flat);
    }
}
