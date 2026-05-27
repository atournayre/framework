<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\RekeyInterface;

/**
 * Trait Rekey.
 *
 * @see RekeyInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Rekey
{
    /**
     * Changes the keys according to the passed function.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function rekey(callable $callback): self
    {
        $map = $this->collection->rekey($callback);

        return self::of($map);
    }
}
