<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Numeric;
use Atournayre\Contracts\Collection\MaxCollectionInterface;

/**
 * Trait MaxCollectionTrait
 *
 * @see MaxCollectionInterface
 */
trait MaxCollectionTrait
{
    /**
 * Returns the maximum value of all elements.
 *
 * @throws ThrowableInterface
 *
 * @api
 */
public function max(?string $key = null) : Numeric
{
    if ($this->isEmpty()->isTrue()) {
        return Numeric::of(0);
    }
    $max = $this->collection->max($key);
    return Numeric::fromFloat($max ?? 0);
}
}
