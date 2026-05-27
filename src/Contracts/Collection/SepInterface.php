<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface SepInterface.
 *
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface SepInterface
{
    /**
     * Sets the separator for paths to multi-dimensional arrays in the current map.
     *
     * @param string $char Separator character, e.g. "." for "key.to.value" instead of "key/to/value"
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function sep(string $char): self;
}
