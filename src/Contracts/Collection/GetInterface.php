<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface GetInterface.
 */
interface GetInterface
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
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function get($key, $default = null);
}
