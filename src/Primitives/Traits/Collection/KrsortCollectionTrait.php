<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\KrsortCollectionInterface;

/**
 * Trait KrsortCollectionTrait.
 *
 * @see KrsortCollectionInterface
 */
trait KrsortCollectionTrait
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
