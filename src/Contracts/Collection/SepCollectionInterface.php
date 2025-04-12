<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface SepCollectionInterface.
 */
interface SepCollectionInterface
{
    /**
     * Sets the separator for paths to multi-dimensional arrays in the current map.
     *
     * @param string $char Separator character, e.g. "." for "key.to.value" instead of "key/to/value"
     *
     * @api
     */
    public function sep(string $char): self;
}
