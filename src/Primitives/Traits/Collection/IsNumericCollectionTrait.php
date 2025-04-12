<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IsNumericCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait IsNumericCollectionTrait.
 *
 * @see IsNumericCollectionInterface
 */
trait IsNumericCollectionTrait
{
    /**
     * Tests if all entries are numeric values.
     *
     * @api
     */
    public function isNumeric(): BoolEnum
    {
        $isNumeric = $this->collection->isNumeric();

        return BoolEnum::fromBool($isNumeric);
    }
}
