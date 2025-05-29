<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\MutableException;
use Atournayre\Contracts\Collection\InsertAfterInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;

/**
 * Trait InsertAfter.
 *
 * @see InsertAfterInterface
 */
trait InsertAfter
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
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        $insertAfter = $this->collection->insertAfter($element, $value);

        return self::of($insertAfter);
    }
}
