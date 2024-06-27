<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Collection;

use Aimeos\Map;
use Atournayre\Common\Assert\Assert;
use Atournayre\Primitives\BoolEnum;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

trait CollectionTrait
{
    private static string $COLLECTION_TYPE_LIST = 'list';
    private static string $COLLECTION_TYPE_MAP = 'map';

    private string $collectionType;

    private string $objectType;

    protected array $elements;

    private function __construct(
        array $elements,
        string $collectionType,
        string $objectType
    )
    {
        $this->elements = $elements;
        $this->collectionType = $collectionType;
        $this->objectType = $objectType;

        foreach ($elements as $element) {
            $this->assertElement($element);
        }
    }

    private function assertElement($element): void
    {
        if ('mixed' === $this->objectType) {
            return;
        }

        $types = array_filter([
            gettype($element),
            is_object($element) ? get_parent_class($element) : null,
            is_object($element) ? get_class($element) : null,
        ]);

        Assert::inArray($this->objectType, $types, 'All elements must be of type ' . $this->objectType . '.');
    }

    private static function getElementType(): string
    {
        if (method_exists(static::class, 'elementType')) {
            return static::elementType();
        }

        throw new \RuntimeException('You must implement the objectType method in your class.');
    }

    public static function from(array $elements): self
    {
        if ([] === $elements) {
            return self::empty();
        }

        $collectionType = is_int(array_key_first($elements))
            ? self::$COLLECTION_TYPE_LIST
            : self::$COLLECTION_TYPE_MAP;

        return new static(
            $elements,
            $collectionType,
            self::getElementType()
        );
    }

    public static function asList($elements = []): self
    {
        return new static(
            $elements,
            self::$COLLECTION_TYPE_LIST,
            self::getElementType()
        );
    }

    public static function asMap($elements = []): self
    {
        return new static(
            $elements,
            self::$COLLECTION_TYPE_MAP,
            self::getElementType()
        );
    }

    public function count(): int
    {
        return count($this->elements);
    }

    public function isList(): BoolEnum
    {
        $isList = $this->collectionType === self::$COLLECTION_TYPE_LIST;

        return BoolEnum::fromBool($isList);
    }

    public function isMap(): BoolEnum
    {
        $isMap = $this->collectionType === self::$COLLECTION_TYPE_MAP;

        return BoolEnum::fromBool($isMap);
    }

    public static function empty(): self
    {
        return new static(
            [],
            self::$COLLECTION_TYPE_LIST,
            self::getElementType()
        );
    }

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->elements);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->elements[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        $this->offsetSetAssertion($offset, $value);

        $key = $offset ?? $this->count();

        $this->elements[$key] = $value;
    }

    private function offsetSetAssertion($offset, $element): void
    {
        $this->assertElement($element);

        $offsetIsNotCompatibleWithList = $this->isList()->isTrue()
            && is_string($offset);

        Assert::false($offsetIsNotCompatibleWithList, 'Adding element to collection (list) using string key is not supported.');

        $offsetIsNotCompatibleWithMap = $this->isMap()->isTrue()
            && (is_int($offset) || is_null($offset));

        Assert::false($offsetIsNotCompatibleWithMap, 'Adding element to collection (map) using numeric key is not supported.');
    }

    public function values(): array
    {
        return array_values($this->elements);
    }

    public function toArray(): array
    {
        return $this->elements;
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
        $hasNoElement = $this->count() === 0;

        return BoolEnum::fromBool($hasNoElement);
    }

    public function hasOneElement(): BoolEnum
    {
        $hasOneElement = $this->count() === 1;

        return BoolEnum::fromBool($hasOneElement);
    }

    public function hasXElements(int $int): BoolEnum
    {
        $hasXElements = $this->count() === $int;

        return BoolEnum::fromBool($hasXElements);
    }


    public function offsetUnset($offset): void
    {
        unset($this->elements[$offset]);
    }

    public function first()
    {
        return reset($this->elements);
    }

    public function last()
    {
        return end($this->elements);
    }

    /**
     * @param array-key $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->elements[$key];
    }

    public function current()
    {
        return current($this->elements);
    }

    /**
     * @param $value
     * @param bool|BoolEnum|callable|null $condition
     * @return void
     */
    public function add(
        $value,
        $condition = null
    ): self
    {
        return $this->set(null, $value, $condition);
    }

    /**
     * @param array-key $key
     * @param $value
     * @param bool|BoolEnum|callable|null $condition
     * @return void
     */
    public function set($key, $value, $condition = null): self
    {
        $conditionIsFalse = !$condition
            || ($condition instanceof BoolEnum && $condition->isFalse())
            || (is_callable($condition) && !$condition($value))
        ;

        if (is_null($condition)) {
            $conditionIsFalse = false;
        }

        if ($conditionIsFalse) {
            return $this;
        }

        $clone = clone $this;
        $clone->offsetSet($key, $value);

        return $clone;
    }

    public function toArrayCollection(): Collection
    {
        $collection = $this->toArray();

        return new ArrayCollection($collection);
    }

    public function toMap(): Map
    {
        return Map::from($this->elements);
    }

    public function keys(): array
    {
        return array_keys($this->elements);
    }
}
