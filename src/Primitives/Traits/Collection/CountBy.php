<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CountByInterface;

/**
 * Trait CountBy.
 *
 * @see CountByInterface
 */
trait CountBy
{
    /**
     * Counts how often the same values are in the map.
     *
     * @param callable|null $callback Function with (value, key) parameters which returns the value to use for counting
     *
     * @api
     */
    public function countBy(?callable $callback = null): self
    {
        $countBy = $this->collection->countBy($callback);

        return self::of($countBy);
    }
}
