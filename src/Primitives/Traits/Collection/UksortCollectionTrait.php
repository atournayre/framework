<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\UksortCollectionInterface;

/**
 * Trait UksortCollectionTrait.
 *
 * @see UksortCollectionInterface
 */
trait UksortCollectionTrait
{
    /**
     * Sorts elements by keys using callback.
     *
     * @api
     */
    public function uksort(callable $callback): self
    {
        $uksort = $this->collection->uksort($callback);

        return self::of($uksort);
    }
}
