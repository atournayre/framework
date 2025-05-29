<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\Collection;

/**
 * Interface IntersectKeysInterface.
 */
interface IntersectKeysInterface
{
    /**
     * Returns the elements shared by keys.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @api
     */
    public function intersectKeys($elements, ?callable $callback = null): self;
}
