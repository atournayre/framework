<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\Collection;

/**
 * Interface IntersectInterface.
 */
interface IntersectInterface
{
    /**
     * Returns the elements shared.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function intersect($elements, ?callable $callback = null): self;
}
