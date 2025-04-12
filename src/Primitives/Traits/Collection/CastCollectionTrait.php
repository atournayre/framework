<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CastCollectionInterface;

/**
 * Trait CastCollectionTrait.
 *
 * @see CastCollectionInterface
 */
trait CastCollectionTrait
{
    /**
     * Casts all entries to the passed type.
     *
     * @api
     */
    public function cast(string $type = 'string'): self
    {
        $cast = $this->collection->cast($type);

        return self::of($cast);
    }
}
