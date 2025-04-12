<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\OffsetSetCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait OffsetSetCollectionTrait.
 *
 * @see OffsetSetCollectionInterface
 */
trait OffsetSetCollectionTrait
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
