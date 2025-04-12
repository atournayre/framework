<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\MinCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;

/**
 * Trait MinCollectionTrait.
 *
 * @see MinCollectionInterface
 */
trait MinCollectionTrait
{
    /**
     * Returns the minium value of all elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function min(?string $key = null): Numeric
    {
        if ($this->isEmpty()->isTrue()) {
            return Numeric::of(0);
        }

        $min = $this->collection->min($key);

        return Numeric::fromFloat($min ?? 0);
    }
}
