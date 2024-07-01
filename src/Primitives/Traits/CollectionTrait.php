<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Primitives\Collection;

trait CollectionTrait
{
    use CollectionCommonTrait;

    protected Collection $collection;

    private function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }
}
