<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UsortInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface UsortInterface
{
    /**
     * Sorts elements using callback assigning new keys.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function usort(callable $callback): self;
}
