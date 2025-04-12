<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface InsertAtCollectionInterface.
 */
interface InsertAtCollectionInterface
{
    /**
     * Inserts the element at the given position in the map.
     *
     * @param int        $pos     Position the element it should be inserted at
     * @param mixed      $element Element to be inserted
     * @param mixed|null $key     Element key or NULL to assign an integer key automatically
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function insertAt(int $pos, $element, $key = null): self;
}
