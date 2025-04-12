<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CastCollectionInterface.
 */
interface CastCollectionInterface
{
    /**
     * Casts all entries to the passed type.
     *
     * @api
     */
    public function cast(string $type = 'string'): self;
}
