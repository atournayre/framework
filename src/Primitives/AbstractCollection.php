<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Aimeos\Map as AimeosMap;
use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Exception\ThrowableInterface;

abstract class AbstractCollection
{
    final private function __construct(
        protected readonly AimeosMap $collection,
        protected readonly BoolEnum $isReadOnly,
    ) {
    }

    /**
     * @api
     *
     * @param array<int|string, mixed>|AimeosMap|string|static|null $collection
     */
    public static function of($collection = []): static
    {
        return match (true) {
            $collection instanceof static => $collection,
            $collection instanceof AimeosMap => new static(
                collection: $collection,
                isReadOnly: BoolEnum::fromBool(false),
            ),
            default => new static(
                collection: AimeosMap::from($collection),
                isReadOnly: BoolEnum::fromBool(false),
            ),
        };
    }

    /**
     * @api
     *
     * @param array<int|string, mixed>|Collection|AimeosMap|string|null $collection
     */
    public static function readOnly($collection = []): static
    {
        return self::of($collection)
            ->asReadOnly()
        ;
    }

    /**
     * @api
     */
    public function asReadOnly(): static
    {
        return new static(
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
    protected function ensureMutable(string $operation): void
    {
        if ($this->isReadOnly->yes()) {
            RuntimeException::new(sprintf('Cannot %s a read-only collection. Use clone to create a mutable copy.', $operation))
                ->throw()
            ;
        }
    }
}
