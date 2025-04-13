<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface EmptyInterface.
 */
interface EmptyInterface
{
    /**
     * Tests if map is empty.
     *
     * @api
     */
    public function empty(): BoolEnum;
}
