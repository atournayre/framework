<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\EmptyCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait EmptyCollectionTrait.
 *
 * @see EmptyCollectionInterface
 */
trait EmptyCollectionTrait
{
    /**
     * Tests if map is empty.
     *
     * @api
     */
    public function empty(): BoolEnum
    {
        $empty = $this->collection->empty();

        return BoolEnum::fromBool($empty);
    }
}
