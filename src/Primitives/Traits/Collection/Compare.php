<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CompareInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait Compare.
 *
 * @see CompareInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Compare
{
    /**
     * Compares the value against all map elements.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function compare(string $value, bool $case = true): BoolEnum
    {
        $compare = $this->collection->strCompare($value, $case);

        return BoolEnum::fromBool($compare);
    }
}
