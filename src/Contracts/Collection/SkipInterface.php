<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface SkipInterface.
 */
interface SkipInterface
{
    /**
     * Skips the given number of items and return the rest.
     *
     * @param \Closure|int|array<array-key,mixed> $offset Number of items to skip or function($item, $key) returning true for skipped items
     *
     * @api
     */
    public function skip($offset): self;
}
