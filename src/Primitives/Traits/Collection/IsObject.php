<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IsObjectInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait IsObject.
 *
 * @see IsObjectInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait IsObject
{
    /**
     * Tests if all entries are objects.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isObject(): BoolEnum
    {
        $isObject = $this->collection->isObject();

        return BoolEnum::fromBool($isObject);
    }
}
