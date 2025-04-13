<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface FilterInterface.
 */
interface FilterInterface
{
    /**
     * Applies a filter to all elements.
     *
     * @api
     */
    public function filter(?callable $callback = null): self;
}
