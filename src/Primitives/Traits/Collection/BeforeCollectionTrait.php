<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\BeforeCollectionInterface;

/**
 * Trait BeforeCollectionTrait.
 *
 * @see BeforeCollectionInterface
 */
trait BeforeCollectionTrait
{
    /**
     * Returns the elements before the given one.
     *
     * @param \Closure|int|string $value
     *
     * @api
     */
    public function before($value): self
    {
        $before = $this->collection->before($value);

        return self::of($before);
    }
}
