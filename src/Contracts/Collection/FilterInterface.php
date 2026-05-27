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
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function filter(?callable $callback = null): self;
}
