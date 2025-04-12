<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\FlipCollectionInterface;

/**
 * Trait FlipCollectionTrait.
 *
 * @see FlipCollectionInterface
 */
trait FlipCollectionTrait
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
