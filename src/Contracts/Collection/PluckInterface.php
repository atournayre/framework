<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PluckInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface PluckInterface
{
    /**
     * Creates a key/value mapping.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function pluck(?string $valuecol = null, ?string $indexcol = null): self;
}
