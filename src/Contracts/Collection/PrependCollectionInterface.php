<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface PrependCollectionInterface.
 */
interface PrependCollectionInterface
{
    /**
     * Adds an element at the beginning.
     *
     * @param mixed           $value Item to add at the beginning
     * @param int|string|null $key   Key for the item or NULL to reindex all numerical keys
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function prepend($value, $key = null): self;
}
