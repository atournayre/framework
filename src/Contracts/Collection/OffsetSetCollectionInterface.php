<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface OffsetSetCollectionInterface.
 */
interface OffsetSetCollectionInterface
{
    /**
     * Overwrites an element.
     *
     * @param mixed|null $key
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function offsetSet($key, $value, ?\Closure $callback = null): void;
}
