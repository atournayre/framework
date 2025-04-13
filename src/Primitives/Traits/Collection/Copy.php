<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\CopyInterface;

/**
 * Trait Copy.
 *
 * @see CopyInterface
 */
trait Copy
{
    /**
     * Creates a new copy.
     *
     * @api
     */
    public function copy(): self
    {
        $clone = $this->collection->copy();

        return self::of($clone);
    }
}
