<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\MutableException;
use Atournayre\Contracts\Collection\PutInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Put.
 *
 * @see PutInterface
 */
trait Put
{
    /**
     * Sets the given key and value in the map.
     *
     * @param int|string $key   Key to set the new value for
     * @param mixed      $value New element that should be set
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function put($key, mixed $value): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $put = $this->collection->put($key, $value);

        return self::of($put);
    }
}
