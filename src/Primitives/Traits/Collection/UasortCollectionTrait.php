<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\UasortCollectionInterface;

/**
 * Trait UasortCollectionTrait.
 *
 * @see UasortCollectionInterface
 */
trait UasortCollectionTrait
{
    /**
     * Sorts elements preserving keys using callback.
     *
     * @api
     */
    public function uasort(callable $callback): self
    {
        $uasort = $this->collection->uasort($callback);

        return self::of($uasort);
    }
}
