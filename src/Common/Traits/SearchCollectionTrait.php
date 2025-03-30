<?php

declare(strict_types=1);

namespace Atournayre\Common\Traits;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Primitives\Collection;

trait SearchCollectionTrait
{
    /**
     * @api
     */
    public function contains(mixed $key, ?string $operator = null, mixed $value = null): BoolEnum
    {
        return Collection::of($this->collection->toArray())
            ->contains($key, $operator, $value)
        ;
    }

    /**
     * @api
     */
    public function search(mixed $value, bool $strict = true): int|string|null
    {
        return Collection::of($this->collection->toArray())
            ->search($value, $strict)
        ;
    }
}
