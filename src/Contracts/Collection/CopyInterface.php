<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CopyInterface.
 */
interface CopyInterface
{
    /**
     * Creates a new copy.
     *
     * @api
     */
    public function copy(): self;
}
