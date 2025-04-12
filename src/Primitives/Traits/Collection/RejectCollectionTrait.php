<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\RejectCollectionInterface;

/**
 * Trait RejectCollectionTrait.
 *
 * @see RejectCollectionInterface
 */
trait RejectCollectionTrait
{
    /**
     * Removes all matched elements.
     *
     * @param Closure|mixed $callback Function with (item) parameter which returns TRUE/FALSE or value to compare with
     *
     * @api
     */
    public function reject($callback = true): self
    {
        $reject = $this->collection->reject($callback);

        return self::of($reject);
    }
}
