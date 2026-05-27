<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface SkipInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface SkipInterface
{
    /**
     * Skips the given number of items and return the rest.
     *
     * @param \Closure|int|array<array-key,mixed> $offset Number of items to skip or function($item, $key) returning true for skipped items
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function skip($offset): self;
}
