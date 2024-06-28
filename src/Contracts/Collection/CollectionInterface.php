<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * @template Element of object The type of the elements in the collection
 * @template Collection of CollectionInterface
 */
interface CollectionInterface
{
    public static function elementType(): string;

    /**
     * @param array<int, Element> $elements
     * @return Collection
     */
    public static function asList($elements = []): self;

    /**
     * @param array<string, Element> $elements
     * @return Collection
     */
    public static function asMap($elements = []): self;

    public function count(): int;

    public function isList(): BoolEnum;

    public function isMap(): BoolEnum;

    /**
     * @return Collection
     */
    public static function empty(): self;

    /**
     * @param array-key $offset
     */
    public function offsetExists($offset): bool;

    /**
     * @param array-key $offset
     * @return Element
     */
    public function offsetGet($offset);

    /**
     * @param array-key $offset
     * @param Element $value
     */
    public function offsetSet($offset, $value): void;

    /**
     * @return array<int, Element>
     */
    public function values(): array;

    /**
     * @return array<array-key, Element>
     */
    public function toArray(): array;

    public function atLeastOneElement(): BoolEnum;

    public function hasSeveralElements(): BoolEnum;

    public function hasNoElement(): BoolEnum;

    public function hasOneElement(): BoolEnum;

    public function hasXElements(int $int): BoolEnum;

    /**
     * @param array-key $offset
     */
    public function offsetUnset($offset): void;

    /**
     * @return Element
     */
    public function first();

    /**
     * @return Element
     */
    public function last();

    /**
     * @param array-key $key
     * @return Element
     */
    public function get($key);

    /**
     * @return Element
     */
    public function current();
}
