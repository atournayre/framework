<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\PullInterface;

/**
 * Trait Pull.
 *
 * @see PullInterface
 */
trait Pull
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
    public function pull($key, $default = null)
    {
        return $this->collection->pull($key, $default);
    }
}
