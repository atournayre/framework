<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Collection\GetInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait Get.
 *
 * @see GetInterface
 */
trait Get
{
    /**
     * Returns an element by key.
     *
     * @param int|string $key
     * @param mixed|null $default
     *
     * @return mixed Value from map or default value
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function get($key, $default = null)
    {
        try {
            return $this->collection->get($key, $default);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }
}
