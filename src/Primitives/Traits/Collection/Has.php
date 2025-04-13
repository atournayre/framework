<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\HasInterface;
use Atournayre\Primitives\BoolEnum;

/**
 * Trait Has.
 *
 * @see HasInterface
 */
trait Has
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
