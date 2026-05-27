<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Aimeos\Map as AimeosMap;
use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection as Collection_;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait Collection
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(
        protected Collection_ $collection,
    ) {
    }

    /**
     * @param array<int|string, mixed>|AimeosMap|Collection_ $collection
     *
     *@api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    protected static function of(Collection_|AimeosMap|array $collection = []): self
    {
        return new self(Collection_::of($collection));
    }

    /**
     * @param array<int|string, mixed>|AimeosMap|Collection_ $collection
     *
     *@api
     */
    protected static function readOnly(Collection_|AimeosMap|array $collection = []): self
    {
        return new self(Collection_::readOnly($collection));
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function isReadOnly(): BoolEnum
    {
        return $this->collection->isReadOnly();
    }
}
