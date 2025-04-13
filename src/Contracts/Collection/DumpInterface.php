<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface DumpInterface.
 */
interface DumpInterface
{
    /**
     * Prints the map content.
     *
     * @api
     */
    public function dump(?callable $callback = null): self;
}
