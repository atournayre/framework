<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\DumpCollectionInterface;

/**
 * Trait DumpCollectionTrait.
 *
 * @see DumpCollectionInterface
 */
trait DumpCollectionTrait
{
    /**
     * Prints the map content.
     *
     * @api
     */
    public function dump(?callable $callback = null): self
    {
        $dump = $this->collection->dump($callback);

        return self::of($dump);
    }
}
