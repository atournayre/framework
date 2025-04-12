<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\Numeric;

/**
 * Interface MinCollectionInterface.
 */
interface MinCollectionInterface
{
    /**
     * Returns the minium value of all elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function min(?string $key = null): Numeric;
}
