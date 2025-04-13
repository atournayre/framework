<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\FirstKeyInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait FirstKey.
 *
 * @see FirstKeyInterface
 */
trait FirstKey
{
    /**
     * Returns the first key.
     *
     * @return mixed First key of map or NULL if empty
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function firstKey()
    {
        try {
            return $this->collection->firstKey();
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
