<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\TransposeCollectionInterface;

/**
 * Trait TransposeCollectionTrait.
 *
 * @see TransposeCollectionInterface
 */
trait TransposeCollectionTrait
{
    /**
     * Exchanges rows and columns for a two dimensional map.
     *
     * @api
     */
    public function transpose(): self
    {
        $transpose = $this->collection->transpose();

        return self::of($transpose);
    }
}
