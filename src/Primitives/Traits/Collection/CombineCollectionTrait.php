<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CombineCollectionInterface;

/**
 * Trait CombineCollectionTrait.
 *
 * @see CombineCollectionInterface
 */
trait CombineCollectionTrait
{
    /**
     * Combines the map elements as keys with the given values.
     *
     * @param iterable<int|string,mixed> $values
     *
     * @api
     */
    public function combine(iterable $values): self
    {
        $combine = $this->collection->combine($values);

        return self::of($combine);
    }
}
