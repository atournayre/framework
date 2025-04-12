<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\NoneCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait NoneCollectionTrait.
 *
 * @see NoneCollectionInterface
 */
trait NoneCollectionTrait
{
    /**
     * Tests if none of the elements are part of the map.
     *
     * @param mixed|null $element Element or elements to search for in the map
     *
     * @api
     */
    public function none($element, bool $strict = false): BoolEnum
    {
        $none = $this->collection->none($element, $strict);

        return BoolEnum::fromBool($none);
    }
}
