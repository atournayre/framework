<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ToArrayInterface;

/**
 * Trait ToArray.
 *
 * @see ToArrayInterface
 */
trait ToArray
{
    /**
     * Returns the plain array.
     *
     * @api
     *
     * @return array<int|string, mixed>
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
