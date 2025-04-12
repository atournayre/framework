<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ClearCollectionInterface;

/**
 * Trait ClearCollectionTrait.
 *
 * @see ClearCollectionInterface
 */
trait ClearCollectionTrait
{
    /**
     * Removes all elements.
     *
     * @api
     */
    public function clear(): self
    {
        $clear = $this->collection->clear();

        return self::of($clear);
    }
}
