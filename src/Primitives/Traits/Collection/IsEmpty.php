<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IsEmptyInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait IsEmpty.
 *
 * @see IsEmptyInterface
 */
trait IsEmpty
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
