<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CombineInterface;

/**
 * Trait Combine.
 *
 * @see CombineInterface
 */
trait Combine
{
    /**
     * Combines the map elements as keys with the given values.
     *
     * @param iterable<int|string,mixed> $values
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function combine(iterable $values): self
    {
        $combine = $this->collection->combine($values);

        return self::of($combine);
    }
}
