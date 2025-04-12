<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\KsortCollectionInterface;

/**
 * Trait KsortCollectionTrait.
 *
 * @see KsortCollectionInterface
 */
trait KsortCollectionTrait
{
    /**
     * Sort elements by keys.
     *
     * @api
     */
    public function ksort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->ksort($options);

        return self::of($clone);
    }
}
