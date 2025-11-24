<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Primitives\Traits\Collection;

use Atournayre\Primitives\Collection;
use PHPUnit\Framework\TestCase;

class GetIteratorTest extends TestCase
{
    public function testGetIteratorReturnsTraversable(): void
    {
        $collection = Collection::of([1, 2, 3]);

        self::assertInstanceOf(\Traversable::class, $collection->getIterator());
    }

    public function testGetIteratorAllowsForeach(): void
    {
        $collection = Collection::of([1, 2, 3]);

        $result = iterator_to_array($collection->getIterator(), false);

        self::assertSame([1, 2, 3], $result);
    }

    public function testGetIteratorWithEmptyCollection(): void
    {
        $collection = Collection::of([]);
        $count = 0;

        foreach ($collection as $value) {
            $count++;
        }

        self::assertSame(0, $count);
    }

    public function testGetIteratorPreservesKeys(): void
    {
        $collection = Collection::of(['a' => 1, 'b' => 2, 'c' => 3]);

        $result = iterator_to_array($collection->getIterator(), true);

        self::assertSame(['a' => 1, 'b' => 2, 'c' => 3], $result);
    }

    public function testGetIteratorWithNestedArrays(): void
    {
        $collection = Collection::of([
            'user1' => ['name' => 'Alice'],
            'user2' => ['name' => 'Bob'],
        ]);

        $result = iterator_to_array($collection->getIterator(), true);

        self::assertSame([
            'user1' => ['name' => 'Alice'],
            'user2' => ['name' => 'Bob'],
        ], $result);
    }
}
