<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\FlatCollectionInterface;

/**
 * Trait FlatCollectionTrait.
 *
 * @see FlatCollectionInterface
 */
trait FlatCollectionTrait
{
    /**
     * Flattens multi-dimensional elements without overwriting elements.
     *
     * @api
     */
    public function flat(?int $depth = null): self
    {
        $flat = $this->collection->flat($depth);

        return self::of($flat);
    }
}
