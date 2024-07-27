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

    /**
     * @param mixed|null $value
     */
    public function add($value, ?\Closure $callback = null): self
    {
        throw new \BadMethodCallException('Static collections cannot be modified.');
    }

    /**
     * @param mixed|null $key
     * @param mixed|null $value
     */
    public function set($key, $value, ?\Closure $callback = null): self
    {
        throw new \BadMethodCallException('Static collections cannot be modified.');
    }

    /**
     * @param array-key $offset
     */
    public function offsetUnset($offset): void
    {
        throw new \BadMethodCallException('Static collections cannot be modified.');
    }
}
