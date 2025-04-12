<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ReverseCollectionInterface;

/**
 * Trait ReverseCollectionTrait.
 *
 * @see ReverseCollectionInterface
 */
trait ReverseCollectionTrait
{
    /**
     * Reverses the array order preserving keys.
     *
     * @api
     */
    public function reverse(): self
    {
        $reverse = $this->collection->reverse();

        return self::of($reverse);
    }
}
