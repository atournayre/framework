<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ValuesInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface ValuesInterface
{
    /**
     * Returns all elements with new keys.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function values(): self;
}
