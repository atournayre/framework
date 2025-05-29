<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ArsortInterface;

/**
 * Trait Arsort.
 *
 * @see ArsortInterface
 */
trait Arsort
{
    /**
     * Reverse sort elements preserving keys.
     *
     * @api
     */
    public function arsort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->arsort($options);

        return self::of($clone);
    }
}
