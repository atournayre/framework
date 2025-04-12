<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\SearchCollectionInterface;

/**
 * Trait SearchCollectionTrait.
 *
 * @see SearchCollectionInterface
 */
trait SearchCollectionTrait
{
    /**
     * Find the key of an element.
     *
     * @param mixed|null $value
     *
     * @return int|string|null Key associated to the value or null if not found
     *
     * @api
     */
    public function search($value, bool $strict = true)
    {
        return $this->collection->search($value, $strict);
    }
}
