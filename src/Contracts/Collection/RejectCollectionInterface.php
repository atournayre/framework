<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface RejectCollectionInterface.
 */
interface RejectCollectionInterface
{
    /**
     * Removes all matched elements.
     *
     * @param Closure|mixed $callback Function with (item) parameter which returns TRUE/FALSE or value to compare with
     *
     * @api
     */
    public function reject($callback = true): self;
}
