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
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function shuffle(bool $assoc = false): self;
}
