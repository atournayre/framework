<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Wrapper\Collection;

trait CollectionTrait
{
    protected Collection $collection;

    private function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @template T
     * @param array<int|string, T> $elements
     * @return self<int|string, T>
     */
    public static function of(array $elements = []): self
    {
        return new self(Collection::of($elements));
    }

    /**
     * @api
     */
    public function count(): int
    {
        return $this->collection->count();
    }

    /**
     * @api
     *
     * @return \ArrayIterator<int|string, mixed>
     */
    public function getIterator(): \ArrayIterator
    {
        return $this->collection->getIterator();
    }

    /**
     * @api
     *
     * @param int|string $offset
     */
    public function offsetExists($offset): bool
    {
        return $this->collection->offsetExists($offset);
    }

    /**
     * @api
     *
     * @param int|string $offset
     */
    public function offsetGet($offset)
    {
        return $this->collection->offsetGet($offset);
    }

    /**
     * @api
     *
     * @param int|string|null $offset
     */
    public function offsetSet($offset, $value): void
    {
        $this->collection->offsetSet($offset, $value);
    }

    /**
     * @api
     *
     * @param int|string $offset
     */
    public function offsetUnset($offset): void
    {
        $this->collection->offsetUnset($offset);
    }

    /**
     * @api
     *
     * @return array<int|string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->collection->jsonSerialize();
    }
}
