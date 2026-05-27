<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\AfterInterface;

/**
 * Trait After.
 *
 * @see AfterInterface
 */
trait After
{
    /**
     * Returns the elements after the given one.
     *
     * @param \Closure|int|string $value
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function after($value): self
    {
        $after = $this->collection->after($value);

        return self::of($after);
    }
}
