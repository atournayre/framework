<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

interface CollectionInterface
{
    public static function elementType(): string;

    /**
     * @param array<array-key, mixed> $elements
     */
    public static function from(array $elements): self;

    /**
     * @param array<int, mixed> $elements
     */
    public static function asList($elements = []): self;

    /**
     * @param array<string, mixed> $elements
     */
    public static function asMap($elements = []): self;

    public function count(): int;

    public function isList(): BoolEnum;

    public function isMap(): BoolEnum;

    public static function empty(): self;

    /**
     * @param array-key $offset
     */
    public function offsetExists($offset): bool;

    /**
     * @template Element
     * @param array-key $offset
     * @return Element
     */
    public function offsetGet($offset);

    /**
     * @param array-key|null $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value): void;

    /**
     * @template Element
     * @return Element[]
     */
    public function values(): array;

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
     * @template Element
     * @return Element
     */
    public function first();

    /**
     * @template Element
     * @return Element
     */
    public function last();

    /**
     * @template Element
     * @param array-key $key
     * @return Element
     */
    public function get($key);

    /**
     * @template Element
     * @return Element
     */
    public function current();
}
