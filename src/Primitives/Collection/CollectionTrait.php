<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Atournayre\Primitives\BoolEnum;
use Atournayre\Wrapper\Collection;

trait CollectionTrait
{
    protected Collection $collection;

    private function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param array<int|string, mixed> $elements
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
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->collection->offsetGet($offset);
    }

    /**
     * @api
     *
     * @param int|string|null $offset
     * @param mixed|null      $value
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

    /**
     * @return mixed|null
     *
     * @throws \Throwable
     *
     * @api
     */
    public function first()
    {
        return $this->collection
            ->first()
        ;
    }

    /**
     * @return mixed|null
     *
     * @throws \Throwable
     *
     * @api
     */
    public function last()
    {
        return $this->collection
            ->last()
        ;
    }

    /**
     * @api
     *
     * @return Collection
     */
    public function values()
    {
        return $this->collection->values();
    }

    /**
     * @api
     *
     * @return array<int|string, mixed>
     */
    public function toArray(): array
    {
        return $this->collection->toArray();
    }

    public function atLeastOneElement(): BoolEnum
    {
        $atLeastOneElement = $this->count() > 0;

        return BoolEnum::fromBool($atLeastOneElement);
    }

    public function hasSeveralElements(): BoolEnum
    {
        $hasSeveralElements = $this->count() > 1;

        return BoolEnum::fromBool($hasSeveralElements);
    }

    public function hasNoElement(): BoolEnum
    {
        $hasNoElement = 0 === $this->count();

        return BoolEnum::fromBool($hasNoElement);
    }

    public function hasOneElement(): BoolEnum
    {
        $hasOneElement = 1 === $this->count();

        return BoolEnum::fromBool($hasOneElement);
    }

    public function hasXElements(int $int): BoolEnum
    {
        $hasXElements = $this->count() === $int;

        return BoolEnum::fromBool($hasXElements);
    }

    public function validate(callable $callback): self
    {
        $collection = $this->collection
            ->each($callback)
            ->toArray()
        ;

        return new self(Collection::of($collection));
    }

    /**
     * @param mixed|null $value
     *
     * @throws \Exception
     */
    public function add($value, ?\Closure $callback = null): self
    {
        $collection = $this->collection
            ->add($value, $callback);

        return new self(Collection::of($collection->toArray()));
    }

    public function map(callable $callback): self
    {
        $collection = $this->collection
            ->map($callback)
            ->toArray()
        ;

        return new self(Collection::of($collection));
    }

    /**
     * @param mixed|null $value
     * @param bool       $strict
     *
     * @return int|string|null
     */
    public function search($value, $strict = true)
    {
        return $this->collection->search($value, $strict);
    }

    /**
     * @param \Closure|iterable|mixed $key
     * @param mixed|null              $value
     */
    public function contains($key, ?string $operator = null, $value = null): BoolEnum
    {
        return $this->collection->contains($key, $operator, $value);
    }

    public function each(callable $callback): self
    {
        $collection = $this->collection
            ->each($callback)
            ->toArray()
        ;

        return new self(Collection::of($collection));
    }
}
