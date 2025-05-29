<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\LastKeyInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait LastKey.
 *
 * @see LastKeyInterface
 */
trait LastKey
{
    /**
     * Returns the last key.
     *
     * @return mixed Last key of map or NULL if empty
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function lastKey()
    {
        try {
            return $this->collection->lastKey();
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
