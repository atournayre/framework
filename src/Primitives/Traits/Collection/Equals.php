<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\EqualsInterface;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;

/**
 * Trait Equals.
 *
 * @see EqualsInterface
 */
trait Equals
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
        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $equals = $this->collection->equals($elements);

        return BoolEnum::fromBool($equals);
    }
}
