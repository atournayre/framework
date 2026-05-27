<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\MutableException;
use Atournayre\Contracts\Collection\PushInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Push.
 *
 * @see PushInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Push
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
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function push($value, ?\Closure $callback = null): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        if ($callback instanceof \Closure && !$callback($value)) {
            return $this;
        }

        $this->collection->push($value);

        return $this;
    }
}
