<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PipeCollectionInterface.
 */
interface PipeCollectionInterface
{
    /**
     * Applies a callback to the whole map.
     *
     * @param \Closure $callback Function with map as parameter which returns arbitrary result
     *
     * @return mixed Result returned by the callback
     *
     * @api
     */
    public function pipe(\Closure $callback);
}
