<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ColInterface.
 */
interface ColInterface
{
    /**
     * Creates a key/value mapping.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function col(?string $valuecol = null, ?string $indexcol = null): self;
}
