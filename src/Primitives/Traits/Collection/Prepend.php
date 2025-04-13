<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\MutableException;
use Atournayre\Contracts\Collection\PrependInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Prepend.
 *
 * @see PrependInterface
 */
trait Prepend
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
    public function prepend($value, $key = null): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $prepend = $this->collection->prepend($value, $key);

        return self::of($prepend);
    }
}
