<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface IsObjectInterface.
 */
interface IsObjectInterface
{
    /**
     * Tests if all entries are objects.
     *
     * @api
     */
    public function isObject(): BoolEnum;
}
