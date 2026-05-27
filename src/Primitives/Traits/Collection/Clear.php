<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ClearInterface;

/**
 * Trait Clear.
 *
 * @see ClearInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Clear
{
    /**
     * Removes all elements.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function clear(): self
    {
        $clear = $this->collection->clear();

        return self::of($clear);
    }
}
