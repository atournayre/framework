<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PartitionInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface PartitionInterface
{
    /**
     * Breaks the list into the given number of groups.
     *
     * @param \Closure|int|array<array-key,mixed> $number Function with (value, index) as arguments returning the bucket key or number of groups
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function partition($number): self;
}
