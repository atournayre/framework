<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\AsortInterface;

/**
 * Trait Asort.
 *
 * @see AsortInterface
 */
trait Asort
{
    /**
     * Sort elements preserving keys.
     *
     * @api
     */
    public function asort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->asort($options);

        return self::of($clone);
    }
}
