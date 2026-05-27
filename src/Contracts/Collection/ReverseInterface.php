<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ReverseInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface ReverseInterface
{
    /**
     * Reverses the array order preserving keys.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function reverse(): self;
}
