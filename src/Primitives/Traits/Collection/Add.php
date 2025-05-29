<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\MutableException;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Add.
 *
 * @see AddInterface
 */
trait Add
{
    /**
     * Adds an element.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function add(mixed $value, ?\Closure $callback = null): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        if ($callback instanceof \Closure && !$callback($value)) {
            return $this;
        }

        $newCollection = $this
            ->collection->push($value)
        ;

        return self::of($newCollection);
    }

    /**
     * Adds an element using callback.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function addWithCallback(mixed $value, \Closure $callback): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        if (!$callback($value)) {
            return $this;
        }

        $newCollection = $this
            ->collection->push($value)
        ;

        return self::of($newCollection);
    }
}
