<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\AfterCollectionInterface;

/**
 * Trait AfterCollectionTrait.
 *
 * @see AfterCollectionInterface
 */
trait AfterCollectionTrait
{
    /**
     * Returns the elements after the given one.
     *
     * @param \Closure|int|string $value
     *
     * @api
     */
    public function after($value): self
    {
        $after = $this->collection->after($value);

        return self::of($after);
    }
}
