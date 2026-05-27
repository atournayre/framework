<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface OnlyInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface OnlyInterface
{
    /**
     * Returns only those elements specified by the keys.
     *
     * @param iterable<mixed>|array<mixed>|string|int $keys Keys of the elements that should be returned
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function only($keys): self;
}
