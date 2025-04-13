<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface SetInterface.
 */
interface SetInterface
{
    /**
     * Overwrites or adds an element.
     *
     * @param mixed|null $key
     * @param mixed|null $value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function set($key, $value, ?\Closure $callback = null): void;
}
