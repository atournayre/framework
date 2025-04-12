<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface BeforeCollectionInterface.
 */
interface BeforeCollectionInterface
{
    /**
     * Returns the elements before the given one.
     *
     * @param \Closure|int|string $value
     *
     * @api
     */
    public function before($value): self;
}
