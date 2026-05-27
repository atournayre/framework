<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\DumpInterface;

/**
 * Trait Dump.
 *
 * @see DumpInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Dump
{
    /**
     * Prints the map content.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function dump(?callable $callback = null): self
    {
        $dump = $this->collection->dump($callback);

        return self::of($dump);
    }
}
