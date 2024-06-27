<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\Collection;

use Atournayre\Primitives\Collection\TypedCollection;
use PHPUnit\Framework\TestCase;

final class TypedCollectionTest extends TestCase
{
    public function testCollectionAsList(): void
    {
        $collection = TypedCollection::asList();

        self::assertCount(0, $collection);
        self::assertTrue($collection->isList()->isTrue());
        self::assertTrue($collection->isMap()->isFalse());
    }

    public function testCollectionAsMap(): void
    {
        $collection = TypedCollection::asMap();

        self::assertCount(0, $collection);
        self::assertTrue($collection->isList()->isFalse());
        self::assertTrue($collection->isMap()->isTrue());
    }

    public function testCollectionAsEmpty(): void
    {
        $collection = TypedCollection::empty();

        self::assertCount(0, $collection);
        self::assertTrue($collection->isList()->isTrue());
        self::assertTrue($collection->isMap()->isFalse());
    }

    public function testCollectionAsListWithElement(): void
    {
        $collection = TypedCollection::asList([
            'element',
        ]);

        self::assertCount(1, $collection);
    }

    public function testCollectionAsMapWithElement(): void
    {
        $collection = TypedCollection::asMap([
            'key' => 'element',
        ]);

        self::assertCount(1, $collection);
    }

    public function testAddElementToListCollectionArrayStyle(): void
    {
        $collection = TypedCollection::empty();
        $collection[] = 'element';

        self::assertCount(1, $collection);
        self::assertArrayHasKey(0, $collection);
        self::assertSame('element', $collection[0]);
    }

    public function testAddElementToMapCollectionArrayStyle(): void
    {
        $collection = TypedCollection::asMap();
        $collection['key'] = 'element';

        self::assertCount(1, $collection);
        self::assertArrayHasKey('key', $collection);
        self::assertSame('element', $collection['key']);
        self::assertTrue($collection->isMap()->isTrue());
    }

    public function testRemoveElementFromListCollectionArrayStyle(): void
    {
        $collection = TypedCollection::asList([
            'element',
        ]);

        unset($collection[0]);

        self::assertCount(0, $collection);
    }

    public function testRemoveElementFromMapCollectionArrayStyle(): void
    {
        $collection = TypedCollection::asMap([
            'key' => 'element',
        ]);

        unset($collection['key']);

        self::assertCount(0, $collection);
    }

    public function testAddElementWithStringKeyToListThrowsException(): void
    {
        $collection = TypedCollection::empty();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Adding element to collection (list) using string key is not supported.');

        $collection[] = 'element';
        $collection['key'] = 'element2';
    }

    public function testAddElementWithNumericKeyToMapThrowsException(): void
    {
        $collection = TypedCollection::asMap();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Adding element to collection (map) using numeric key is not supported.');

        $collection['key'] = 'element';
        $collection[] = 'element2';
    }

    public function testGetCollectionValues(): void
    {
        $collection = TypedCollection::asList([
            'element',
        ]);

        self::assertSame(['element'], $collection->values());
    }

    public function testGetCollectionValuesAsArray(): void
    {
        $collection = TypedCollection::asList([
            'element',
        ]);

        self::assertSame(['element'], $collection->toArray());
    }

    public function testAtLeastOneElement(): void
    {
        $collection = TypedCollection::asList([
            'element',
        ]);

        self::assertTrue($collection->atLeastOneElement()->isTrue());
    }

    public function testHasSeveralElements(): void
    {
        $collection = TypedCollection::asList([
            'element1',
            'element2',
        ]);

        self::assertTrue($collection->hasSeveralElements()->isTrue());
    }

    public function testHasNoElement(): void
    {
        $collection = TypedCollection::empty();

        self::assertTrue($collection->hasNoElement()->isTrue());
    }

    public function testHasOneElement(): void
    {
        $collection = TypedCollection::asList([
            'element',
        ]);

        self::assertTrue($collection->hasOneElement()->isTrue());
    }

    public function testHasXElements(): void
    {
        $collection = TypedCollection::asList([
            'element1',
            'element2',
        ]);

        self::assertTrue($collection->hasXElements(2)->isTrue());
    }

    public function testGetFirstElement(): void
    {
        $collection = TypedCollection::asList([
            'element1',
            'element2',
        ]);

        self::assertSame('element1', $collection->first());
    }

    public function testGetLastElement(): void
    {
        $collection = TypedCollection::asList([
            'element1',
            'element2',
        ]);

        self::assertSame('element2', $collection->last());
    }

    // get by key
    public function testGetElementByKey(): void
    {
        $collection = TypedCollection::asMap([
            'key' => 'element',
        ]);

        self::assertSame('element', $collection->get('key'));

        $collection = TypedCollection::asList([
            'element',
        ]);

        self::assertSame('element', $collection->get(0));
    }

    public function testGetCurrentElement(): void
    {
        $collection = TypedCollection::asList([
            'element1',
            'element2',
        ]);

        self::assertSame('element1', $collection->current());
    }

    public function testCreateCollectionAutomatically(): void
    {
        $collection = TypedCollection::from([
            'element1',
            'element2',
        ]);

        self::assertTrue($collection->isList()->isTrue());

        $collection = TypedCollection::from([]);

        self::assertTrue($collection->isList()->isTrue());

        $collection = TypedCollection::from([
            'key' => 'element',
        ]);

        self::assertTrue($collection->isMap()->isTrue());
    }
}
