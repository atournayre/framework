<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface DumpCollectionInterface.
 */
interface DumpCollectionInterface
{
    /**
     * Prints the map content.
     *
     * @api
     */
    public function dump(?callable $callback = null): self;
}
