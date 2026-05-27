<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ShuffleInterface;

/**
 * Trait Shuffle.
 *
 * @see ShuffleInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Shuffle
{
    /**
     * Randomizes the element order.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function shuffle(bool $assoc = false): self
    {
        $shuffle = $this->collection->shuffle($assoc);

        return self::of($shuffle);
    }
}
