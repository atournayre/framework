<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface IsScalarInterface.
 */
interface IsScalarInterface
{
    /**
     * Tests if all entries are scalar values.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function isScalar(): BoolEnum;
}
