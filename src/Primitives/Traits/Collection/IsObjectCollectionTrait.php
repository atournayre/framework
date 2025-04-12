<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IsObjectCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait IsObjectCollectionTrait.
 *
 * @see IsObjectCollectionInterface
 */
trait IsObjectCollectionTrait
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
