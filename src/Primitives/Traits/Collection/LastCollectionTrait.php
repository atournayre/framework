<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\LastCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait LastCollectionTrait.
 *
 * @see LastCollectionInterface
 */
trait LastCollectionTrait
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
