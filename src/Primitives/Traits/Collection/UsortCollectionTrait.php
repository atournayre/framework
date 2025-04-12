<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\UsortCollectionInterface;

/**
 * Trait UsortCollectionTrait.
 *
 * @see UsortCollectionInterface
 */
trait UsortCollectionTrait
{
    /**
     * Sorts elements using callback assigning new keys.
     *
     * @api
     */
    public function usort(callable $callback): self
    {
        $this->collection->usort($callback);

        return $this;
    }
}
