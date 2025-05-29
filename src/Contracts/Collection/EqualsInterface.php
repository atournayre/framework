<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;

/**
 * Interface EqualsInterface.
 */
interface EqualsInterface
{
    /**
     * Tests if map contents are equal.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements to test against
     *
     * @api
     */
    public function equals($elements): BoolEnum;
}
