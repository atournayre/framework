<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UniqueInterface.
 */
interface UniqueInterface
{
    /**
     * Returns all unique elements preserving keys.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function unique(?string $key = null): self;
}
