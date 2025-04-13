<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\MutableException;
use Atournayre\Contracts\Collection\UnshiftInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Unshift.
 *
 * @see UnshiftInterface
 */
trait Unshift
{
    /**
     * Adds an element at the beginning.
     *
     * @param mixed           $value Item to add at the beginning
     * @param int|string|null $key   Key for the item or NULL to reindex all numerical keys
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function unshift(mixed $value, $key = null): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $unshift = $this->collection->unshift($value, $key);

        return self::of($unshift);
    }
}
