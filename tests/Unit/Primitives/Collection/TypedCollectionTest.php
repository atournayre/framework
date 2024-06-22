<?php

declare(strict_types=1);

namespace Atournayre\Tests\Primitives\Collection;

use Aimeos\Map;
use Atournayre\Primitives\Collection\TypedCollection;
use Atournayre\Tests\Fixtures\People;
use Atournayre\Tests\Fixtures\PeopleMustBeMap;
use Atournayre\Tests\Fixtures\Person;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\InvalidArgumentException;

final class TypedCollectionTest extends TestCase
{
    /**
     * @covers \Atournayre\Primitives\Collection\TypedCollection::asList
     */
    public function testMutableList(): void
    {
        $collection = TypedCollection::asList(['a']);
        $collection[] = 'd';
        self::assertCount(2, $collection);
    }

    /**
     * @covers \Atournayre\Primitives\Collection\TypedCollection::asList
     */
    public function testMutableMap(): void
    {
        $collection = TypedCollection::asMap(['a' => 'a']);
        $collection['b'] = 'b';
        self::assertCount(2, $collection);
    }

    /**
     * @covers \Atournayre\Primitives\Collection\TypedCollection::asList
     */
    public function testMutableListOfStringsThrowsExceptionIfOneElementIsNull(): void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Expected a string. Got: NULL');

        $collection = TypedCollection::asList(['a']);
        $collection[] = null;
    }

    /**
     * @covers \Atournayre\Primitives\Collection\TypedCollection::asMap
     */
    public function testMutableMapOfStringsThrowsExceptionIfOneElementIsNull(): void
    {
        self::expectException(InvalidArgumentException::class);
        self::expectExceptionMessage('Expected a string. Got: NULL');

        $collection = TypedCollection::asMap(['a' => 'a']);
        $collection['b'] = null;
    }

    /**
     * @covers \Atournayre\Primitives\Collection\TypedCollection::toArrayCollection
     */
    public function testListIsAnArrayCollection(): void
    {
        $collection = TypedCollection::asList(['a']);
        $arrayCollection = $collection->toArrayCollection();
        self::assertIsInt($arrayCollection->key());
        self::assertEquals('a', $arrayCollection->current());
    }

    /**
     * @covers \Atournayre\Primitives\Collection\TypedCollection::toMap
     *
     * @throws \Throwable
     */
    public function testListIsAMap(): void
    {
        $collection = TypedCollection::asList(['a']);
        $map = $collection->toMap();
        self::assertIsInt($map->firstKey());
        self::assertEquals('a', $map->first());
    }

    /**
     * @throws \Throwable
     */
    public function testListIsAMapAndCanBeConvertedToArrayCollection(): void
    {
        $collection = TypedCollection::asList(['a', 'b']);
        $map = $collection->toMap();
        self::assertEquals('a', $map->first());
    }

    /**
     * @throws \Throwable
     */
    public function testFromArrayCollectionToMapUsingList(): void
    {
        $arrayCollection = new ArrayCollection(['a', 'b']);
        $map = TypedCollection::fromArrayCollectionToMap($arrayCollection);
        self::assertEquals('a', $map->first());
        self::assertEquals(0, $map->firstKey());
    }

    /**
     * @throws \Throwable
     */
    public function testFromArrayCollectionToMapUsingMap(): void
    {
        $arrayCollection = new ArrayCollection(['a' => 'a', 'b' => 'b']);
        $map = TypedCollection::fromArrayCollectionToMap($arrayCollection);
        self::assertEquals('a', $map->first());
        self::assertEquals('a', $map->firstKey());
    }

    public function testFromMapToArrayCollectionUsingList(): void
    {
        $arrayCollection = new Map(['a', 'b']);
        $map = TypedCollection::fromMapToArrayCollection($arrayCollection);
        self::assertEquals('a', $map->first());
        self::assertEquals(0, $map->key());
    }

    public function testFromMapToArrayCollectionUsingMap(): void
    {
        $arrayCollection = new Map(['a' => 'a', 'b' => 'b']);
        $map = TypedCollection::fromMapToArrayCollection($arrayCollection);
        self::assertEquals('a', $map->first());
        self::assertEquals('a', $map->key());
    }

    public function testCreateCollectionOfPerson(): void
    {
        $taylor = new Person('Taylor');
        $jeffrey = new Person('Jeffrey');

        $people = People::asList([$taylor, $jeffrey]);

        self::assertCount(2, $people);
    }

    public function testCreateCollectionOfPersonWithAnError(): void
    {
        self::expectException(\InvalidArgumentException::class);

        $taylor = new Person('Taylor');
        $jeffrey = new Person('Jeffrey');

        $people = People::asList([$taylor, $jeffrey]);
        $people[] = new \stdClass(); // @phpstan-ignore-line
    }

    public function testCreateCollectionOfPersonWithAValidationError(): void
    {
        self::expectException(\InvalidArgumentException::class);

        $taylor = new Person('Taylor');
        $jeffrey = new Person('PersonWithASuperLongNameThatExceedsTheMaximumLengthAllowedByTheCollection');

        People::asList([$taylor, $jeffrey]);
    }

    public function testCreateCollectionOfPersonWithoutValidationError(): void
    {
        $taylor = new Person('Taylor');

        $collection = People::asList([$taylor]);
        self::assertTrue($collection->hasOneElement());
    }

    public function testForceCreateCollectionAsMap(): void
    {
        self::expectException(\InvalidArgumentException::class);

        $taylor = new Person('Taylor');
        PeopleMustBeMap::asList([$taylor]);
    }

    public function testCreateCollectionAsMapVerifyValidation(): void
    {
        $taylor = new Person('Taylor');
        $people = PeopleMustBeMap::asMap(['taylor' => $taylor]);
        self::assertCount(1, $people);
    }

    public function testFirstElement(): void
    {
        $taylor = new Person('Taylor');
        $jeffrey = new Person('Jeffrey');

        $people = People::asList([$taylor, $jeffrey]);

        self::assertEquals($taylor, $people->first());
    }

    public function testLastElement(): void
    {
        $taylor = new Person('Taylor');
        $jeffrey = new Person('Jeffrey');

        $people = People::asList([$taylor, $jeffrey]);

        self::assertEquals($jeffrey, $people->last());
    }

    public function testCreateMapFromMap(): void
    {
        $map = Map::from([
            'taylor' => new Person('Taylor'),
            'jeffrey' => new Person('Jeffrey'),
        ]);

        $people = People::fromMapAsMap($map);

        self::assertCount(2, $people);
        self::assertTrue($people->isMap());
    }

    public function testCreateListFromMap(): void
    {
        $people = Map::from([
            new Person('Taylor'),
            new Person('Jeffrey'),
        ]);

        $list = People::fromMapAsList($people);

        self::assertCount(2, $list);
        self::assertTrue($list->isList());
    }

    public function testAddToEmptyCollection(): void
    {
        $people = People::asList([]);
        $people[] = (new Person('Taylor'));

        self::assertCount(1, $people);
    }

    public function testAddConditionallyToCollection(): void
    {
        $people = People::asList([]);
        $people = $people->add(new Person('Taylor'), fn () => false);

        self::assertCount(0, $people);
    }

    public function testSetConditionallyToCollection(): void
    {
        $people = People::asMap([]);
        $people = $people->set('taylor', new Person('Taylor'), fn () => false);

        self::assertCount(0, $people);
    }
}
