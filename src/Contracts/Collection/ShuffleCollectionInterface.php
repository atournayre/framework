<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ShuffleCollectionInterface.
 */
interface ShuffleCollectionInterface
{
    /**
     * Randomizes the element order.
     *
     * @api
     */
    public function shuffle(bool $assoc = false): self;
}
