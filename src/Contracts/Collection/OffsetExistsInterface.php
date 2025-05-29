<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface OffsetExistsInterface.
 */
interface OffsetExistsInterface
{
    /**
     * Checks if the key exists.
     *
     * @param int|string $key Key to check for
     *
     * @api
     */
    public function offsetExists($key): BoolEnum;
}
