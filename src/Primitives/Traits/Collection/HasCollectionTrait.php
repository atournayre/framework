<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasCollectionInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait HasCollectionTrait.
 *
 * @see HasCollectionInterface
 */
trait HasCollectionTrait
{
    /**
     * Tests if a key exists.
     *
     * @param array<int|string>|int|string $key Key of the requested item or list of keys
     *
     * @api
     */
    public function has($key): BoolEnum
    {
        $has = $this->collection->has($key);

        return BoolEnum::fromBool($has);
    }
}
