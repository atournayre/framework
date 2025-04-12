<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ReverseCollectionInterface.
 */
interface ReverseCollectionInterface
{
    /**
     * Reverses the array order preserving keys.
     *
     * @api
     */
    public function reverse(): self;
}
