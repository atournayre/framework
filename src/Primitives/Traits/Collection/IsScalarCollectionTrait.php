<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IsScalarCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait IsScalarCollectionTrait.
 *
 * @see IsScalarCollectionInterface
 */
trait IsScalarCollectionTrait
{
    /**
     * Tests if all entries are scalar values.
     *
     * @api
     */
    public function isScalar(): BoolEnum
    {
        $isScalar = $this->collection->isScalar();

        return BoolEnum::fromBool($isScalar);
    }
}
