<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ReverseInterface;

/**
 * Trait Reverse.
 *
 * @see ReverseInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Reverse
{
    /**
     * Reverses the array order preserving keys.
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function reverse(): self
    {
        $reverse = $this->collection->reverse();

        return self::of($reverse);
    }
}
