<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Primitives\Collection\CollectionCommonTrait;

trait CollectionTrait
{
    use CollectionCommonTrait;

    protected Collection $collection;

    private function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }
}
