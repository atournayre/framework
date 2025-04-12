<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\InsertBeforeCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait InsertBeforeCollectionTrait.
 *
 * @see InsertBeforeCollectionInterface
 */
trait InsertBeforeCollectionTrait
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
    public function insertBefore($element, $value): self
    {
        $this->ensureMutable('insertBefore');
        $insertBefore = $this->collection->insertBefore($element, $value);

        return self::of($insertBefore);
    }
}
