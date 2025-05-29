<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IsObjectInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait IsObject.
 *
 * @see IsObjectInterface
 */
trait IsObject
{
    /**
     * Tests if all entries are objects.
     *
     * @api
     */
    public function isObject(): BoolEnum
    {
        $isObject = $this->collection->isObject();

        return BoolEnum::fromBool($isObject);
    }
}
