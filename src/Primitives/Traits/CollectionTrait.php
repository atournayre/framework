<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Primitives\Collection;

trait CollectionTrait
{
    use CollectionCommonTrait;

    private function __construct(
        protected Collection $collection,
    )
    {
    }
}
