<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ValuesCollectionInterface;

/**
 * Trait ValuesCollectionTrait.
 *
 * @see ValuesCollectionInterface
 */
trait ValuesCollectionTrait
{
    /**
     * Returns all elements with new keys.
     *
     * @api
     */
    public function values(): self
    {
        $values = $this->collection->values();

        return self::of($values);
    }
}
