<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface MapInterface.
 */
interface MapInterface
{
    /**
     * Applies a callback to each element and returns the results.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function map(callable $callback): self;
}
