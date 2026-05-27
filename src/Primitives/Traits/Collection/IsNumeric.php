<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IsNumericInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait IsNumeric.
 *
 * @see IsNumericInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait IsNumeric
{
    /**
     * Tests if all entries are numeric values.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isNumeric(): BoolEnum
    {
        $isNumeric = $this->collection->isNumeric();

        return BoolEnum::fromBool($isNumeric);
    }
}
