<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;

/**
 * Interface MaxInterface.
 */
interface MaxInterface
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
