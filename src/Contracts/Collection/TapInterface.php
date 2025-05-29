<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface TapInterface.
 */
interface TapInterface
{
    /**
     * Passes a clone of the map to the given callback.
     *
     * @param callable $callback Function receiving ($map) parameter
     *
     * @api
     */
    public function tap(callable $callback): self;
}
