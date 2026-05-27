<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface EachInterface.
 */
interface EachInterface
{
    /**
     * Applies a callback to each element.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function each(\Closure $callback): self;
}
