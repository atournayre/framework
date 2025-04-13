<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\WalkInterface;

/**
 * Trait Walk.
 *
 * @see WalkInterface
 */
trait Walk
{
    /**
     * Applies the given callback to all elements.
     *
     * @param callable $callback  Function with (item, key, data) parameters
     * @param mixed    $data      Arbitrary data that will be passed to the callback as third parameter
     * @param bool     $recursive TRUE to traverse sub-arrays recursively (default), FALSE to iterate Map elements only
     *
     * @api
     */
    public function walk(callable $callback, $data = null, bool $recursive = true): self
    {
        $walk = $this->collection->walk($callback, $data, $recursive);

        return self::of($walk);
    }
}
