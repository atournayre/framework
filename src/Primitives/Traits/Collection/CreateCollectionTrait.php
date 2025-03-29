<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Aimeos\Map as AimeosMap;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Exception\RuntimeException;

trait CreateCollectionTrait
{
    /**
     * Clones the map and all objects within.
     *
     * @api
     */
    public function clone(): self
    {
        return new self($this->collection->clone());
    }

    /**
     * Creates a new copy.
     *
     * @api
     */
    public function copy(): self
    {
        $clone = $this->collection
            ->copy()
        ;

        return new self($clone);
    }

    /**
     * Splits a string into a map of elements.
     *
     * @api
     */
    public static function explode(string $delimiter, string $string, int $limit = PHP_INT_MAX): self
    {
        return new self(AimeosMap::explode($delimiter, $string, $limit));
    }

    /**
     * Creates a new map from passed elements.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function from()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }

    /**
     * Creates a new map from a JSON string.
     *
     * @throws ThrowableInterface
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function fromJson()
    {
        RuntimeException::new('Not implemented yet!')->throw();
    }

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
        $tree = $this->collection
            ->tree($idKey, $parentKey, $nestKey)
        ;

        return new self($tree);
    }
}
