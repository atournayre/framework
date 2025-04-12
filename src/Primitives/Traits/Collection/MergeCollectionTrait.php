<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\MergeCollectionInterface;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection;

/**
 * Trait MergeCollectionTrait.
 *
 * @see MergeCollectionInterface
 */
trait MergeCollectionTrait
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
        $this->ensureMutable('merge');

        if ($elements instanceof self) {
            $elements = $elements->toArray();
        }

        $merge = $this->collection->merge($elements, $recursive);

        return self::of($merge);
    }
}
