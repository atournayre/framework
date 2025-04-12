<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\RandomCollectionInterface;

/**
 * Trait RandomCollectionTrait.
 *
 * @see RandomCollectionInterface
 */
trait RandomCollectionTrait
{
    /**
     * Returns random elements preserving keys.
     *
     * @param int $max Maximum number of elements that should be returned
     *
     * @api
     */
    public function random(int $max = 1): self
    {
        $random = $this->collection->random($max);

        return self::of($random);
    }
}
