<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PushCollectionInterface.
 */
interface PushCollectionInterface
{
    /**
     * Adds an element to the end.
     *
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function push($value, ?\Closure $callback = null): self;
}
