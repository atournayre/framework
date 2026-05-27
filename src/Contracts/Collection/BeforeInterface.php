<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface BeforeInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface BeforeInterface
{
    /**
     * Returns the elements before the given one.
     *
     * @param \Closure|int|string $value
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function before($value): self;
}
