<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CastInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface CastInterface
{
    /**
     * Casts all entries to the passed type.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function cast(string $type = 'string'): self;
}
