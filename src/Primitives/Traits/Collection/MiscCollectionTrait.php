<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

use Atournayre\Primitives\BoolEnum;

trait MiscCollectionTrait
{
    /**
     * Sets or returns the seperator for paths to multi-dimensional arrays.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function delimiter()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Returns an iterator for the elements.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function getIterator()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Specifies the data which should be serialized to JSON.
     *
     * @api
     */
    // @phpstan-ignore-next-line Remove this line when the method is implemented
    public function jsonSerialize()
    {
        throw new \RuntimeException('Not implemented yet!');
    }

    /**
     * Checks if the key exists.
     *
     * @param int|string $key Key to check for
     *
     * @api
     */
    public function offsetExists($key): BoolEnum
    {
        $exists = $this->collection
            ->offsetExists($key)
        ;

        return BoolEnum::fromBool($exists);
    }

    /**
     * Returns an element by key.
     *
     * @param array-key $offset
     *
     * @return mixed|null
     *
     * @api
     */
    public function offsetGet($offset)
    {
        return $this->collection->offsetGet($offset);
    }

    /**
     * Overwrites an element.
     *
     * @api
     *
     * @param mixed|null $key
     * @param mixed|null $value
     */
    public function offsetSet($key, $value, ?\Closure $callback = null): void
    {
        $this->set($key, $value, $callback);
    }

    /**
     * Removes an element by key.
     *
     * @api
     *
     * @param array-key $key
     */
    public function offsetUnset($key): void
    {
        $this->collection->offsetUnset($key);
    }

    /**
     * Sets the separator for paths to multi-dimensional arrays in the current map.
     *
     * @param string $char Separator character, e.g. "." for "key.to.value" instead of "key/to/value"
     *
     * @api
     */
    public function sep(string $char): self
    {
        $sep = $this->collection
            ->sep($char)
        ;

        return new self($sep);
    }
}
