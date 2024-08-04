<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Aimeos\Map as AimeosMap;
use Atournayre\Primitives\Traits\Collection\AccessCollectionTrait;
use Atournayre\Primitives\Traits\Collection\AddCollectionTrait;
use Atournayre\Primitives\Traits\Collection\AggregateCollectionTrait;
use Atournayre\Primitives\Traits\Collection\CreateCollectionTrait;
use Atournayre\Primitives\Traits\Collection\DebugCollectionTrait;
use Atournayre\Primitives\Traits\Collection\MiscCollectionTrait;
use Atournayre\Primitives\Traits\Collection\OrderCollectionTrait;
use Atournayre\Primitives\Traits\Collection\ShortenCollectionTrait;
use Atournayre\Primitives\Traits\Collection\TestCollectionTrait;
use Atournayre\Primitives\Traits\Collection\TransformCollectionTrait;

final class Collection
{
    use AccessCollectionTrait;
    use AddCollectionTrait;
    use AggregateCollectionTrait;
    use CreateCollectionTrait;
    use DebugCollectionTrait;
    use MiscCollectionTrait;
    use OrderCollectionTrait;
    use ShortenCollectionTrait;
    use TestCollectionTrait;
    use TransformCollectionTrait;

    private AimeosMap $collection;

    private function __construct(AimeosMap $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param array<int|string, mixed>|Collection|string|null $collection
     */
    public static function of($collection = []): self
    {
        if ($collection instanceof self) {
            return $collection;
        }

        return new self(AimeosMap::from($collection));
    }

    /**
     * @param iterable<int|string,mixed>|Collection $elements List of elements
     *
     * @return array<int|string,mixed>
     */
    private function convertElementsToArray($elements): array
    {
        if ($elements instanceof self) {
            return $elements->all();
        }

        return (array) $elements;
    }
}
