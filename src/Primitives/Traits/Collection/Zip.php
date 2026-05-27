<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Contracts\Collection\ZipInterface;

/**
 * Trait Zip.
 *
 * @see ZipInterface
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Zip
{
    /**
     * Merges the values of all arrays at the corresponding index.
     *
     * @param array<int|string,mixed>|\Traversable<int|string,mixed>|\Iterator<int|string,mixed> $arrays List of arrays to merge with at the same position
     *
     * @api
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function zip(...$arrays): self
    {
        $zip = $this->collection->zip(...$arrays);

        return self::of($zip);
    }
}
