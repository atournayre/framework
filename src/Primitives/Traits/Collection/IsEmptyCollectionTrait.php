<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IsEmptyCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait IsEmptyCollectionTrait.
 *
 * @see IsEmptyCollectionInterface
 */
trait IsEmptyCollectionTrait
{
    /**
     * Tests if map is empty.
     *
     * @api
     */
    public function isEmpty(): BoolEnum
    {
        $isEmpty = $this->collection->isEmpty();

        return BoolEnum::fromBool($isEmpty);
    }
}
