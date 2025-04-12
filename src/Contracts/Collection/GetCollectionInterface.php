<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface GetCollectionInterface.
 */
interface GetCollectionInterface
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
    public function get($key, $default = null);
}
