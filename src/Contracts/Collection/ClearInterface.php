<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ClearInterface.
 */
interface ClearInterface
{
    /**
     * Removes all elements.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function clear(): self;
}
