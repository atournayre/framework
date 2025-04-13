<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ExceptInterface.
 */
interface ExceptInterface
{
    /**
     * Returns a new map without the passed element keys.
     *
     * @param iterable<string|int>|array<string|int>|string|int $keys List of keys to remove
     *
     * @api
     */
    public function except($keys): self;
}
