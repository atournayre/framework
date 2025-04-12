<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PartitionCollectionInterface.
 */
interface PartitionCollectionInterface
{
    /**
     * Breaks the list into the given number of groups.
     *
     * @param \Closure|int|array<array-key,mixed> $number Function with (value, index) as arguments returning the bucket key or number of groups
     *
     * @api
     */
    public function partition($number): self;
}
