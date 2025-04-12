<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ContainsCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait ContainsCollectionTrait.
 *
 * @see ContainsCollectionInterface
 */
trait ContainsCollectionTrait
{
    /**
     * Tests if an item exists in the map.
     *
     * @api
     *
     * @param mixed|null $key
     * @param mixed|null $value
     */
    public function contains($key, ?string $operator = null, $value = null): BoolEnum
    {
        $contains = $this->collection->contains($key, $operator, $value);

        return BoolEnum::fromBool($contains);
    }
}
