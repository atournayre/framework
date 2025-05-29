<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ShuffleInterface.
 */
interface ShuffleInterface
{
    /**
     * Randomizes the element order.
     *
     * @api
     */
    public function shuffle(bool $assoc = false): self;
}
