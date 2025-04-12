<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\PutCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait PutCollectionTrait.
 *
 * @see PutCollectionInterface
 */
trait PutCollectionTrait
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
    public function put($key, $value): self
    {
        $this->ensureMutable('put');
        $put = $this->collection->put($key, $value);

        return self::of($put);
    }
}
