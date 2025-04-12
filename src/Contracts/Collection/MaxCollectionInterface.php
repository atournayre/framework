<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\Numeric;

/**
 * Interface MaxCollectionInterface.
 */
interface MaxCollectionInterface
{
    /**
     * Returns the maximum value of all elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function max(?string $key = null): Numeric;
}
