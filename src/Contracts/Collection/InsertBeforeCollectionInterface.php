<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface InsertBeforeCollectionInterface.
 */
interface InsertBeforeCollectionInterface
{
    /**
     * Inserts the value before the given element.
     *
     * @param mixed $element Element before the value is inserted
     * @param mixed $value   Element or list of elements to insert
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function insertBefore($element, $value): self;
}
