<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

interface CollectionAddInterface
{
    public function add(mixed $value, ?\Closure $callback = null): self;
}
