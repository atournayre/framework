<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\MutableException;
use Atournayre\Contracts\Collection\InsertBeforeInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait InsertBefore.
 *
 * @see InsertBeforeInterface
 */
trait InsertBefore
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
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $insertBefore = $this->collection->insertBefore($element, $value);

        return self::of($insertBefore);
    }
}
