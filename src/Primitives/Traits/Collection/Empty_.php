<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\EmptyInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait Empty.
 *
 * @see EmptyInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Empty_
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
