<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\SpliceCollectionInterface;

/**
 * Trait SpliceCollectionTrait.
 *
 * @see SpliceCollectionInterface
 */
trait SpliceCollectionTrait
{
    /**
     * Replaces a slice by new elements.
     *
     * @param int      $offset      Number of elements to start from
     * @param int|null $length      Number of elements to remove, NULL for all
     * @param mixed    $replacement List of elements to insert
     *
     * @api
     */
    public function splice(int $offset, ?int $length = null, $replacement = []): self
    {
        $splice = $this->collection->splice($offset, $length, $replacement);

        return self::of($splice);
    }
}
