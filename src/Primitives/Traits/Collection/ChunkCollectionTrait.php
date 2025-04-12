<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ChunkCollectionInterface;

/**
 * Trait ChunkCollectionTrait.
 *
 * @see ChunkCollectionInterface
 */
trait ChunkCollectionTrait
{
    /**
     * Splits the map into chunks.
     *
     * @api
     */
    public function chunk(int $size, bool $preserve = false): self
    {
        $chunk = $this->collection->chunk($size, $preserve);

        return self::of($chunk);
    }
}
