<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\MutableException;
use Atournayre\Contracts\Collection\SetInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Set.
 *
 * @see SetInterface
 */
trait Set
{
    /**
     * Overwrites or adds an element.
     *
     * @param mixed|null $key
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function set($key, $value, ?\Closure $callback = null): void
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        if ($callback instanceof \Closure && !$callback($key, $value)) {
            return;
        }

        $this->collection->set($key, $value);
    }
}
