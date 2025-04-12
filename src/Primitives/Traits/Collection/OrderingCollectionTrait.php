<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

trait OrderingCollectionTrait
{
    /**
     * Reverse sort elements preserving keys.
     *
     * @api
     */
    public function arsort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->arsort($options);

        return self::of($clone);
    }

    /**
     * Sort elements preserving keys.
     *
     * @api
     */
    public function asort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->asort($options);

        return self::of($clone);
    }

    /**
     * Reverse sort elements by keys.
     *
     * @api
     */
    public function krsort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->krsort($options);

        return self::of($clone);
    }

    /**
     * Sort elements by keys.
     *
     * @api
     */
    public function ksort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->ksort($options);

        return self::of($clone);
    }

    /**
     * Orders elements by the passed keys.
     *
     * @param iterable<mixed> $keys Keys of the elements in the required order
     *
     * @api
     */
    public function order(iterable $keys): self
    {
        $order = $this->collection
            ->order($keys)
        ;

        return self::of($order);
    }

    /**
     * Reverses the array order preserving keys.
     *
     * @api
     */
    public function reverse(): self
    {
        $reverse = $this->collection
            ->reverse()
        ;

        return self::of($reverse);
    }

    /**
     * Reverse sort elements using new keys.
     *
     * @api
     */
    public function rsort(int $options = SORT_REGULAR): self
    {
        $clone = $this->collection;
        $clone->rsort($options);

        return self::of($clone);
    }

    /**
     * Randomizes the element order.
     *
     * @api
     */
    public function shuffle(bool $assoc = false): self
    {
        $shuffle = $this->collection
            ->shuffle($assoc)
        ;

        return self::of($shuffle);
    }

    /**
     * Sorts the elements assigning new keys.
     *
     * @api
     */
    public function sort(int $options = SORT_REGULAR): self
    {
        $sort = $this->collection
            ->sort($options)
        ;

        return self::of($sort);
    }

    /**
     * Sorts elements preserving keys using callback.
     *
     * @api
     */
    public function uasort(callable $callback): self
    {
        $uasort = $this->collection
            ->uasort($callback)
        ;

        return self::of($uasort);
    }

    /**
     * Sorts elements by keys using callback.
     *
     * @api
     */
    public function uksort(callable $callback): self
    {
        $uksort = $this->collection
            ->uksort($callback)
        ;

        return self::of($uksort);
    }

    /**
     * Sorts elements using callback assigning new keys.
     *
     * @api
     */
    public function usort(callable $callback): self
    {
        $this->collection->usort($callback);

        return $this;
    }
}
