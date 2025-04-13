<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CombineInterface.
 */
interface CombineInterface
{
    /**
     * Combines the map elements as keys with the given values.
     *
     * @param iterable<int|string,mixed> $values
     *
     * @api
     */
    public function combine(iterable $values): self;
}
