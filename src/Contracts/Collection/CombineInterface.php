<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

/**
 * Interface CombineInterface.
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface CombineInterface
{
    /**
     * Combines the map elements as keys with the given values.
     *
     * @param iterable<int|string,mixed> $values
     *
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function combine(iterable $values): self;
}
