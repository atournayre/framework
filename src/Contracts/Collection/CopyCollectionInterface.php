<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CopyCollectionInterface.
 */
interface CopyCollectionInterface
{
    /**
     * Creates a new copy.
     *
     * @api
     */
    public function copy(): self;
}
