<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IntersectKeysInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait IntersectKeys.
 *
 * @see IntersectKeysInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait IntersectKeys
{
    /**
     * Returns the elements shared by keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function intersectKeys($elements, ?callable $callback = null): self
    {
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $intersectKeys = $this->collection->intersectKeys($elements, $callback);

        return self::of($intersectKeys);
    }
}
