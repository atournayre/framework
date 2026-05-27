<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ReverseInterface;

/**
 * Trait Reverse.
 *
 * @see ReverseInterface
 */
trait Reverse
{
    /**
     * Reverses the array order preserving keys.
     *
     * @api
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function reverse(): self
    {
        $reverse = $this->collection->reverse();

        return self::of($reverse);
    }
}
