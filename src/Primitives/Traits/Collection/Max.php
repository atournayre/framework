<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\MaxInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;

/**
 * Trait Max.
 *
 * @see MaxInterface
 */
trait Max
{
    /**
     * Returns the maximum value of all elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function max(?string $key = null): Numeric
    {
        if ($this->isEmpty()->isTrue()) {
            return Numeric::of(0);
        }

        $max = $this->collection->max($key);

        return Numeric::fromFloat($max ?? 0);
    }
}
