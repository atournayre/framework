<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface AddInterface.
 */
interface AddInterface
{
    /**
     * Adds an element.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function add(mixed $value, ?\Closure $callback = null): self;

    /**
     * Adds an element using callback.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function addWithCallback(mixed $value, \Closure $callback): self;
}
