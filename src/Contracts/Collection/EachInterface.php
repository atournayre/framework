<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface EachInterface.
 */
interface EachInterface
{
    /**
     * Applies a callback to each element.
     *
     * @api
     */
    public function each(\Closure $callback): self;
}
