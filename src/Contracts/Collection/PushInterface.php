<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface PushInterface.
 */
interface PushInterface
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
