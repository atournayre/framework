<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PullInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface PullInterface
{
    /**
     * Returns and removes an element by key.
     *
     * @param int|string $key     Key to retrieve the value for
     * @param mixed      $default Default value if key isn't available
     *
     * @return mixed Value from map or default value
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function pull($key, mixed $default = null);
}
