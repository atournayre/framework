<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\OffsetExistsInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait OffsetExists.
 *
 * @see OffsetExistsInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait OffsetExists
{
    /**
     * Checks if the key exists.
     *
     * @param int|string $key Key to check for
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function offsetExists($key): BoolEnum
    {
        $exists = $this->collection->offsetExists($key);

        return BoolEnum::fromBool($exists);
    }
}
