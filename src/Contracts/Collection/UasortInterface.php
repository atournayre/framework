<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UasortInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface UasortInterface
{
    /**
     * Sorts elements preserving keys using callback.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function uasort(callable $callback): self;
}
