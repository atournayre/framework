<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ZipCollectionInterface.
 */
interface ZipCollectionInterface
{
    /**
     * Merges the values of all arrays at the corresponding index.
     *
     * @param array<int|string,mixed>|\Traversable<int|string,mixed>|\Iterator<int|string,mixed> $arrays List of arrays to merge with at the same position
     *
     * @api
     */
    public function zip(...$arrays): self;
}
