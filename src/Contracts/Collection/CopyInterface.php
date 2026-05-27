<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CopyInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface CopyInterface
{
    /**
     * Creates a new copy.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function copy(): self;
}
