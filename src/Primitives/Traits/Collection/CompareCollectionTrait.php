<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CompareCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait CompareCollectionTrait.
 *
 * @see CompareCollectionInterface
 */
trait CompareCollectionTrait
{
    /**
     * Compares the value against all map elements.
     *
     * @api
     */
    public function compare(string $value, bool $case = true): BoolEnum
    {
        $compare = $this->collection->strCompare($value, $case);

        return BoolEnum::fromBool($compare);
    }
}
