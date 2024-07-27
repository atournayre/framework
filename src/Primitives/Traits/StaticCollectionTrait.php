<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits;

use Atournayre\Primitives\Collection;

trait StaticCollectionTrait
{
    use CollectionCommonTrait;

    protected Collection $collection;

    private function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function add($value, ?\Closure $callback = null): self
    {
        throw new \BadMethodCallException('Static collections cannot be modified.');
    }

    public function set($key, $value, ?\Closure $callback = null): self
    {
        throw new \BadMethodCallException('Static collections cannot be modified.');
    }

    public function offsetUnset($key): void
    {
        throw new \BadMethodCallException('Static collections cannot be modified.');
    }
}
