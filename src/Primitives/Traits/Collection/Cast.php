<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CastInterface;

/**
 * Trait Cast.
 *
 * @see CastInterface
 */
trait Cast
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
