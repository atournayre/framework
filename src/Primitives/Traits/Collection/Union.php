<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\MutableException;
use Atournayre\Contracts\Collection\UnionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait Union.
 *
 * @see UnionInterface
 */
trait Union
{
    /**
     * Adds the elements without overwriting existing ones.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function union($elements): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $union = $this->collection->union($elements);

        return self::of($union);
    }
}
