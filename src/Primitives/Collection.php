<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Aimeos\Map as AimeosMap;
use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Traits\Collection\AccessCollectionTrait;
use Atournayre\Primitives\Traits\Collection\AddCollectionTrait;
use Atournayre\Primitives\Traits\Collection\AggregateCollectionTrait;
use Atournayre\Primitives\Traits\Collection\CountableCollectionTrait;
use Atournayre\Primitives\Traits\Collection\CreateCollectionTrait;
use Atournayre\Primitives\Traits\Collection\DebugCollectionTrait;
use Atournayre\Primitives\Traits\Collection\MiscCollectionTrait;
use Atournayre\Primitives\Traits\Collection\OrderingCollectionTrait;
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
    use OrderingCollectionTrait;
    use ShortenCollectionTrait;
    use TestCollectionTrait;
    use TransformCollectionTrait;

    private function __construct(
        private readonly AimeosMap $collection,
        private readonly BoolEnum $isReadOnly,
    ) {
    }

    /**
     * @api
     *
     * @param array<int|string, mixed>|Collection|AimeosMap|string|null $collection
     */
    public static function of(Collection|AimeosMap|array|string|null $collection = []): self
    {
        return match (true) {
            $collection instanceof Collection => $collection,
            is_string($collection) => new self(
                collection: AimeosMap::from([$collection]),
                isReadOnly: BoolEnum::fromBool(false),
            ),
            $collection instanceof AimeosMap => new self(
                collection: $collection,
                isReadOnly: BoolEnum::fromBool(false),
            ),
            default => new self(
                collection: AimeosMap::from($collection ?? []),
                isReadOnly: BoolEnum::fromBool(false),
            ),
        };
    }

    /**
     * @api
     *
     * @param array<int|string, mixed>|Collection|AimeosMap|string|null $collection
     */
    public static function readOnly(Collection|AimeosMap|array|string|null $collection = []): self
    {
        return self::of($collection)
            ->asReadOnly()
        ;
    }

    /**
     * @api
     */
    public function asReadOnly(): self
    {
        return new self(
            collection: AimeosMap::from($this->collection),
            isReadOnly: BoolEnum::fromBool(true)
        );
    }

    public function isReadOnly(): BoolEnum
    {
        return $this->isReadOnly;
    }

    /**
     * @throws ThrowableInterface
     */
    private function ensureMutable(string $operation): void
    {
        $this
            ->isReadOnly
            ->throwIfTrue(RuntimeException::new(sprintf('Cannot %s a read-only collection. Use clone to create a mutable copy.', $operation)))
        ;
    }
}
