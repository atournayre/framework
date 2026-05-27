<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\IsScalarInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait IsScalar.
 *
 * @see IsScalarInterface
 */
trait IsScalar
{
    /**
     * Tests if all entries are scalar values.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isScalar(): BoolEnum
    {
        $isScalar = $this->collection->isScalar();

        return BoolEnum::fromBool($isScalar);
    }
}
