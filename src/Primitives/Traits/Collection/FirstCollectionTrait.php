<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\FirstCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait FirstCollectionTrait.
 *
 * @see FirstCollectionInterface
 */
trait FirstCollectionTrait
{
    /**
     * Returns the first element.
     *
     * @param mixed|null $default
     *
     * @return mixed|null
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function first($default = null)
    {
        try {
            return $this->collection->first($default);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
