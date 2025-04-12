<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\RekeyCollectionInterface;

/**
 * Trait RekeyCollectionTrait.
 *
 * @see RekeyCollectionInterface
 */
trait RekeyCollectionTrait
{
    /**
     * Changes the keys according to the passed function.
     *
     * @api
     */
    public function rekey(callable $callback): self
    {
        $map = $this->collection->rekey($callback);

        return self::of($map);
    }
}
