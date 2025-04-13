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
    public function isScalar(): BoolEnum;
}
