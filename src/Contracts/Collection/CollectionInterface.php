<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

interface CollectionInterface
{
    public static function elementType(): string;

    public static function asList($elements = []): self;

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
     * @param array-key $offset
     */
    public function offsetGet($offset);

    /**
     * @param array-key $offset
     */
    public function offsetSet($offset, $value): void;

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

    public function first();

    public function last();

    public function get($key);

    public function current();
}
