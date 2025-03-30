<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

interface CollectionSearchInterface
{
    public function contains(mixed $key, ?string $operator = null, mixed $value = null): BoolEnum;

    public function search(mixed $value, bool $strict = true): int|string|null;
}
