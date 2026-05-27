<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\TransposeInterface;

/**
 * Trait Transpose.
 *
 * @see TransposeInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Transpose
{
    /**
     * Exchanges rows and columns for a two dimensional map.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function transpose(): self
    {
        $transpose = $this->collection->transpose();

        return self::of($transpose);
    }
}
