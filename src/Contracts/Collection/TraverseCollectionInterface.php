<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface TraverseCollectionInterface.
 */
interface TraverseCollectionInterface
{
    /**
     * Traverses trees of nested items passing each item to the callback.
     *
     * @param \Closure|null $callback Callback with (entry, key, level, $parent) arguments, returns the entry added to result
     * @param string        $nestKey  Key to the children of each item
     *
     * @api
     */
    public function traverse(?\Closure $callback = null, string $nestKey = 'children'): self;
}
