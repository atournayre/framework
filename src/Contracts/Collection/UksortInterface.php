<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UksortInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface UksortInterface
{
    /**
     * Sorts elements by keys using callback.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function uksort(callable $callback): self;
}
