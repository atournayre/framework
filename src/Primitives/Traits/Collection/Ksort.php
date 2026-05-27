<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\KsortInterface;

/**
 * Trait Ksort.
 *
 * @see KsortInterface
 */
trait Ksort
{
    /**
     * Sort elements by keys.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function ksort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->ksort($options);

        return self::of($clone);
    }
}
