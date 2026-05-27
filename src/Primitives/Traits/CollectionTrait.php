<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Primitives\Collection;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
trait CollectionTrait
{
    use CollectionCommonTrait;

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(
        protected Collection $collection,
    ) {
    }
}
