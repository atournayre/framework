<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\InInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait In.
 *
 * @see InInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait In
{
    /**
     * Tests if element is included.
     *
     * @param mixed|array $element Element or elements to search for in the map
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function in($element, bool $strict = false): BoolEnum
    {
        $in = $this->collection->in($element, $strict);

        return BoolEnum::fromBool($in);
    }
}
