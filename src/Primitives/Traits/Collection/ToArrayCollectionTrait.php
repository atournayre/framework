<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ToArrayCollectionInterface;

/**
 * Trait ToArrayCollectionTrait.
 *
 * @see ToArrayCollectionInterface
 */
trait ToArrayCollectionTrait
{
    /**
     * Returns the plain array.
     *
     * @api
     *
     * @return array<int|string, mixed>
     */
    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
