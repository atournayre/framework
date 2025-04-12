<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ReduceCollectionInterface;

/**
 * Trait ReduceCollectionTrait.
 *
 * @see ReduceCollectionInterface
 */
trait ReduceCollectionTrait
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
    public function reduce(callable $callback, $initial = null)
    {
        return $this->collection->reduce($callback, $initial);
    }
}
