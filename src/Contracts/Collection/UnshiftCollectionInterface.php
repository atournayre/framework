<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Interface UnshiftCollectionInterface.
 */
interface UnshiftCollectionInterface
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
    public function unshift($value, $key = null): self;
}
