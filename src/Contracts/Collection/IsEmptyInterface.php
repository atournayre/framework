<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface IsEmptyInterface.
 */
interface IsEmptyInterface
{
    /**
     * Tests if map is empty.
     *
     * @api
     */
    public function isEmpty(): BoolEnum;
}
