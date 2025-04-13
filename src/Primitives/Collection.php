<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Primitives\Traits\Collection\Access;
use Atournayre\Primitives\Traits\Collection\Add;
use Atournayre\Primitives\Traits\Collection\Aggregate;
use Atournayre\Primitives\Traits\Collection\Countable;
use Atournayre\Primitives\Traits\Collection\Create;
use Atournayre\Primitives\Traits\Collection\Debug;
use Atournayre\Primitives\Traits\Collection\Misc;
use Atournayre\Primitives\Traits\Collection\Ordering;
use Atournayre\Primitives\Traits\Collection\Shorten;
use Atournayre\Primitives\Traits\Collection\Test;
use Atournayre\Primitives\Traits\Collection\Transform;
use Aimeos\Map as AimeosMap;

final class Collection
{
    use Access;
    use Add;
    use Aggregate;
    use Countable;
    use Create;
    use Debug;
    use Misc;
    use Ordering;
    use Shorten;
    use Test;
    use Transform;

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
}
