<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CloneInterface.
 */
interface CloneInterface
{
    /**
     * Clones the map and all objects within.
     *
     * @api
     */
    public function clone(): self;
}
