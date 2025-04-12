<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Primitives\Collection;

trait ConstructCollectionTrait
{
    private function __construct(
        protected Collection $collection,
    ) {
    }

    protected static function of(Collection $collection): self
    {
        return new self($collection);
    }
}
