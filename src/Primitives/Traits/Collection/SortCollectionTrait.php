<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\SortCollectionInterface;

/**
 * Trait SortCollectionTrait.
 *
 * @see SortCollectionInterface
 */
trait SortCollectionTrait
{
    /**
     * Sorts the elements assigning new keys.
     *
     * @api
     */
    public function sort(int $options = SORT_REGULAR): self
    {
        $sort = $this->collection->sort($options);

        return self::of($sort);
    }
}
