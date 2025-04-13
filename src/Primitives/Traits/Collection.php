<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Aimeos\Map as AimeosMap;
use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Primitives\Collection as Collection_;

trait Collection
{
    private function __construct(
        protected Collection_ $collection,
    ) {
    }

    /**
     * @param array<int|string, mixed>|AimeosMap|Collection_ $collection
     *
     *@api
     */
    protected static function of(Collection_|AimeosMap|array $collection = []): self
    {
        return new self(Collection_::of($collection));
    }

    /**
     * @param array<int|string, mixed>|AimeosMap|Collection_ $collection
     *
     *@api
     */
    protected static function readOnly(Collection_|AimeosMap|array $collection = []): self
    {
        return new self(Collection_::readOnly($collection));
    }

    /**
     * @throws ThrowableInterface
     */
    private function ensureMutable(string $operation): void
    {
        $this
            ->collection
            ->isReadOnly()
            ->throwIfTrue(RuntimeException::new(sprintf('Cannot %s a read-only collection. Use clone to create a mutable copy.', $operation)))
        ;
    }
}
