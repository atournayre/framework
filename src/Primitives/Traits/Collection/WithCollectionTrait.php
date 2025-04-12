<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\WithCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait WithCollectionTrait.
 *
 * @see WithCollectionInterface
 */
trait WithCollectionTrait
{
    /**
     * Returns a copy and sets an element.
     *
     * @param int|string $key   Array key to set or replace
     * @param mixed      $value New value for the given key
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function with($key, $value): self
    {
        $this->ensureMutable('with');
        $with = $this->collection->with($key, $value);

        return self::of($with);
    }
}
