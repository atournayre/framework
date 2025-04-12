<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\EqualsCollectionInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;

/**
 * Trait EqualsCollectionTrait.
 *
 * @see EqualsCollectionInterface
 */
trait EqualsCollectionTrait
{
    /**
     * Tests if map contents are equal.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements to test against
     *
     * @api
     */
    public function equals($elements): BoolEnum
    {
        $elements = $this->convertElementsToArray($elements);
        $equals = $this->collection->equals($elements);

        return BoolEnum::fromBool($equals);
    }
}
