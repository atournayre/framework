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

    /**
     * @var array<array-key, mixed>
     */
    protected array $elements;

    /**
     * @param array<array-key, mixed> $elements
     */
    private function __construct(
        array $elements,
        string $collectionType,
        string $objectType
    ) {
        $this->elements = $elements;
        $this->collectionType = $collectionType;
        $this->objectType = $objectType;

        foreach ($elements as $element) {
            $this->assertElement($element);
        }
    }

    /**
     * Asserts that the given element is of the expected type.
     *
     * @param mixed $element
     * @throws \InvalidArgumentException If the element is not of the expected type.
     */
    protected function assertElement($element): void
    {
        if ('mixed' === $this->objectType) {
            return;
        }

        $types = array_filter([
            gettype($element),
            is_object($element) ? get_parent_class($element) : null,
            is_object($element) ? get_class($element) : null,
        ]);

        Assert::inArray($this->objectType, $types, 'All elements must be of type '.$this->objectType.'.');
    }

    /**
     * @throws \RuntimeException If the elementType method is not implemented.
     */
    private static function getElementType(): string
    {
        if (method_exists(static::class, 'elementType')) {
            // @phpstan-ignore-next-line
            return static::elementType();
        }

        throw new \RuntimeException('You must implement the objectType method in your class.');
    }

    /**
     * @param array<array-key, mixed> $elements
     */
    public static function from(array $elements): self
    {
        if ([] === $elements) {
            return self::empty();
        }

        $collectionType = is_int(array_key_first($elements))
            ? self::$COLLECTION_TYPE_LIST
            : self::$COLLECTION_TYPE_MAP;

        // @phpstan-ignore-next-line
        return new static(
            $elements,
            $collectionType,
            self::getElementType()
        );
    }

    /**
     * @param array<int, mixed> $elements
     * @return static
     */
    public static function asList($elements = []): self
    {
        // @phpstan-ignore-next-line
        return new static(
            $elements,
            self::$COLLECTION_TYPE_LIST,
            self::getElementType()
        );
    }

    /**
     * @param array<string, mixed> $elements
     * @return static
     */
    public static function asMap($elements = []): self
    {
        // @phpstan-ignore-next-line
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
        // @phpstan-ignore-next-line
        return new static(
            [],
            self::$COLLECTION_TYPE_LIST,
            self::getElementType()
        );
    }

    /**
     * @param array-key $offset
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->elements);
    }

    /**
     * @param array-key $offset
     */
    public function offsetGet($offset)
    {
        return $this->elements[$offset];
    }

    /**
     * @param array-key|null $offset
     * @param mixed          $value
     */
    public function offsetSet($offset, $value): void
    {
        $this->offsetSetAssertion($offset, $value);

        $key = $offset ?? $this->count();

        $this->elements[$key] = $value;
    }

    /**
     * @param array-key|null $offset
     * @param mixed          $element
     * @throws \InvalidArgumentException If the offset is not compatible with the collection type.
     */
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

    /**
     * @return array<array-key, mixed>
     */
    public function values(): array
    {
        return array_values($this->elements);
    }

    /**
     * @return array<array-key, mixed>
     */
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

    /**
     * @param array-key $offset
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->elements[$offset]);
    }

    public function first()
    {
        // TODO Recuperer ou ::asNull
        return reset($this->elements);
    }

    public function last()
    {
        // TODO Recuperer ou ::asNull
        return end($this->elements);
    }

    /**
     * @param array-key $key
     */
    public function get($key)
    {
        // TODO Recuperer ou ::asNull
        return $this->elements[$key];
    }

    public function current()
    {
        // TODO Recuperer ou ::asNull
        return current($this->elements);
    }

    /**
     * @param mixed $value
     * @param bool|BoolEnum|callable|null $condition
     */
    public function add(
        $value,
        $condition = null
    ): self {
        return $this->set(null, $value, $condition);
    }

    /**
     * @param array-key|null              $key
     * @param mixed                       $value
     * @param bool|BoolEnum|callable|null $condition
     */
    public function set($key, $value, $condition = null): self
    {
        $conditionIsFalse = !$condition
            || ($condition instanceof BoolEnum && $condition->isFalse())
            || (is_callable($condition) && !$condition($value));

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

    /**
     * @return array<array-key, mixed>
     */
    public function keys(): array
    {
        return array_keys($this->elements);
    }
}
