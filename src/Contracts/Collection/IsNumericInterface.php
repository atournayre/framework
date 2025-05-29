<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface IsNumericInterface.
 */
interface IsNumericInterface
{
    /**
     * Tests if all entries are numeric values.
     *
     * @api
     */
    public function isNumeric(): BoolEnum;
}
