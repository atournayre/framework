<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\SetCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait SetCollectionTrait.
 *
 * @see SetCollectionInterface
 */
trait SetCollectionTrait
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
        $this->ensureMutable('set');
        if ($callback instanceof \Closure && !$callback($key, $value)) {
            return;
        }

        $this->collection->set($key, $value);
    }
}
