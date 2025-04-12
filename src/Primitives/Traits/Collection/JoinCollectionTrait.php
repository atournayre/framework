<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\JoinCollectionInterface;

/**
 * Trait JoinCollectionTrait.
 *
 * @see JoinCollectionInterface
 */
trait JoinCollectionTrait
{
    /**
     * Returns concatenated elements as string with separator.
     *
     * @api
     */
    public function join(string $glue = ''): string
    {
        return $this->collection->values()->join($glue);
    }
}
