<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Aimeos\Map as AimeosMap;
use Atournayre\Primitives\Traits\Collection\AccessCollectionTrait;
use Atournayre\Primitives\Traits\Collection\AddCollectionTrait;
use Atournayre\Primitives\Traits\Collection\AggregateCollectionTrait;
use Atournayre\Primitives\Traits\Collection\CountableCollectionTrait;
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
    use CountableCollectionTrait;
    use CreateCollectionTrait;
    use DebugCollectionTrait;
    use MiscCollectionTrait;
    use OrderCollectionTrait;
    use ShortenCollectionTrait;
    use TestCollectionTrait;
    use TransformCollectionTrait;

    private AimeosMap $collection;

    private BoolEnum $isReadOnly;

    private function __construct(AimeosMap $collection)
    {
        $this->collection = $collection;
        $this->isReadOnly = BoolEnum::fromBool(false);
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
     * @api
     *
     * @param array<int|string, mixed>|Collection|string|null $collection
     */
    public static function readOnly($collection = []): self
    {
        return self::of($collection)->asReadOnly();
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

    /**
     * @api
     */
    public function asReadOnly(): self
    {
        $clone = clone $this;
        $clone->isReadOnly = BoolEnum::fromBool(true);

        return $clone;
    }

    public function isReadOnly(): BoolEnum
    {
        return $this->isReadOnly;
    }

    /**
     * @throws \Exception
     */
    private function ensureMutable(string $operation): void
    {
        if ($this->isReadOnly->yes()) {
            throw new \RuntimeException(sprintf('Cannot %s a read-only collection. Use clone to create a mutable copy.', $operation));
        }
    }
}
