<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CastInterface.
 */
interface CastInterface
{
    /**
     * Casts all entries to the passed type.
     *
     * @api
     */
    public function cast(string $type = 'string'): self;
}
