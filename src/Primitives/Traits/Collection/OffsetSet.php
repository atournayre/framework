<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\OffsetSetInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait OffsetSet.
 *
 * @see OffsetSetInterface
 */
trait OffsetSet
{
    /**
     * Overwrites an element.
     *
     * @param mixed|null $key
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function offsetSet($key, $value, ?\Closure $callback = null): void
    {
        $this->set($key, $value, $callback);
    }
}
