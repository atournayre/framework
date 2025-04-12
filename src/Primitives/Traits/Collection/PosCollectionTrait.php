<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\PosCollectionInterface;

/**
 * Trait PosCollectionTrait.
 *
 * @see PosCollectionInterface
 */
trait PosCollectionTrait
{
    /**
     * Returns the numerical index of the value.
     *
     * @param \Closure|mixed $value Value to search for or function with (item, key) parameters return TRUE if value is found
     *
     * @api
     */
    public function pos($value): ?int
    {
        return $this->collection->pos($value);
    }
}
