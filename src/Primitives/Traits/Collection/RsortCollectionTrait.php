<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\RsortCollectionInterface;

/**
 * Trait RsortCollectionTrait.
 *
 * @see RsortCollectionInterface
 */
trait RsortCollectionTrait
{
    /**
     * Reverse sort elements using new keys.
     *
     * @api
     */
    public function rsort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->rsort($options);

        return self::of($clone);
    }
}
