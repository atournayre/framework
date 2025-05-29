<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Common\Exception\MutableException;
use Atournayre\Contracts\Collection\MergeInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait Merge.
 *
 * @see MergeInterface
 */
trait Merge
{
    /**
     * Combines elements overwriting existing ones.
     *
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    public function merge($elements, bool $recursive = false): self
    {
        $this->isReadOnly()->throwIfTrue(MutableException::becauseMustBeImmutable());

        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $merge = $this->collection->merge($elements, $recursive);

        return self::of($merge);
    }
}
