<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\PushCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait PushCollectionTrait.
 *
 * @see PushCollectionInterface
 */
trait PushCollectionTrait
{
    /**
     * Adds an element to the end.
     *
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function push($value, ?\Closure $callback = null): self
    {
        $this->ensureMutable('push');
        if ($callback instanceof \Closure && !$callback($value)) {
            return $this;
        }

        $this->collection->push($value);

        return $this;
    }
}
