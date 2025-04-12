<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\InsertAfterCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait InsertAfterCollectionTrait.
 *
 * @see InsertAfterCollectionInterface
 */
trait InsertAfterCollectionTrait
{
    /**
     * Inserts the value after the given element.
     *
     * @param mixed|null $element Element to insert after
     * @param mixed|null $value   Value to insert
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function insertAfter($element, $value): self
    {
        $this->ensureMutable('insertAfter');
        $insertAfter = $this->collection->insertAfter($element, $value);

        return self::of($insertAfter);
    }
}
