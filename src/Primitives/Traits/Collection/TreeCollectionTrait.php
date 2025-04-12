<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\TreeCollectionInterface;

/**
 * Trait TreeCollectionTrait.
 *
 * @see TreeCollectionInterface
 */
trait TreeCollectionTrait
{
    /**
     * Creates a tree structure from the list items.
     *
     * @param string $idKey     Name of the key with the unique ID of the node
     * @param string $parentKey Name of the key with the ID of the parent node
     * @param string $nestKey   Name of the key with will contain the children of the node
     *
     * @api
     */
    public function tree(string $idKey, string $parentKey, string $nestKey = 'children'): self
    {
        $tree = $this->collection->tree($idKey, $parentKey, $nestKey);

        return self::of($tree);
    }
}
