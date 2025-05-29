<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\KrsortInterface;

/**
 * Trait Krsort.
 *
 * @see KrsortInterface
 */
trait Krsort
{
    /**
     * Reverse sort elements by keys.
     *
     * @api
     */
    public function krsort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->krsort($options);

        return self::of($clone);
    }
}
