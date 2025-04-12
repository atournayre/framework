<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\GrepCollectionInterface;

/**
 * Trait GrepCollectionTrait.
 *
 * @see GrepCollectionInterface
 */
trait GrepCollectionTrait
{
    /**
     * Applies a regular expression to all elements.
     *
     * @api
     */
    public function grep(string $pattern, int $flags = 0): self
    {
        $grep = $this->collection->grep($pattern, $flags);

        return self::of($grep);
    }
}
