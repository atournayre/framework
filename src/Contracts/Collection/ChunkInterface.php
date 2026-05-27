<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface ChunkInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface ChunkInterface
{
    /**
     * Splits the map into chunks.
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function chunk(int $size, bool $preserve = false): self;
}
