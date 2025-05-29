<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\FlipInterface;

/**
 * Trait Flip.
 *
 * @see FlipInterface
 */
trait Flip
{
    /**
     * Exchanges keys with their values.
     *
     * @api
     */
    public function flip(): self
    {
        $flip = $this->collection->flip();

        return self::of($flip);
    }
}
