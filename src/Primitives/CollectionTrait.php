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

    /**
     * @param array<int|string, mixed> $collection
     */
    public static function of(array $collection): self
    {
        return new self(Collection::of($collection));
    }
}
