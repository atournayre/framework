<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ChunkInterface.
 */
interface ChunkInterface
{
    /**
     * Splits the map into chunks.
     *
     * @api
     */
    public function chunk(int $size, bool $preserve = false): self;
}
