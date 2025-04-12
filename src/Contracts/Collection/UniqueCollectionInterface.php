<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface UniqueCollectionInterface.
 */
interface UniqueCollectionInterface
{
    /**
     * Returns all unique elements preserving keys.
     *
     * @api
     */
    public function unique(?string $key = null): self;
}
