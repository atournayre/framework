<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ClearInterface.
 */
interface ClearInterface
{
    /**
     * Removes all elements.
     *
     * @api
     */
    public function clear(): self;
}
