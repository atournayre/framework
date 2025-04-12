<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ChunkCollectionInterface.
 */
interface ChunkCollectionInterface
{
    /**
     * Splits the map into chunks.
     *
     * @api
     */
    public function chunk(int $size, bool $preserve = false): self;
}
