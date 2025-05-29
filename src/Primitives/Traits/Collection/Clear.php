<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ClearInterface;

/**
 * Trait Clear.
 *
 * @see ClearInterface
 */
trait Clear
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
