<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ReduceInterface;

/**
 * Trait Reduce.
 *
 * @see ReduceInterface
 */
trait Reduce
{
    /**
     * Computes a single value from the map content.
     *
     * @param callable $callback Function with (result, value) parameters and returns result
     * @param mixed    $initial  Initial value when computing the result
     *
     * @return mixed Value computed by the callback function
     *
     * @api
     */
    public function reduce(callable $callback, mixed $initial = null)
    {
        return $this->collection->reduce($callback, $initial);
    }
}
