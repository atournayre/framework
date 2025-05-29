<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\LastInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Last.
 *
 * @see LastInterface
 */
trait Last
{
    /**
     * Returns the last element.
     *
     * @param mixed|null $default
     *
     * @return mixed|null
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function last($default = null)
    {
        try {
            return $this->collection->last($default);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
