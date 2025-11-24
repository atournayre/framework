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
        $result = [];

        foreach ($collection as $value) {
            $result[] = $value;
        }

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
        $result = [];

        foreach ($collection as $key => $value) {
            $result[$key] = $value;
        }

        self::assertSame(['a' => 1, 'b' => 2, 'c' => 3], $result);
    }

    public function testGetIteratorWithNestedArrays(): void
    {
        $collection = Collection::of([
            'user1' => ['name' => 'Alice'],
            'user2' => ['name' => 'Bob'],
        ]);
        $result = [];

        foreach ($collection as $key => $value) {
            $result[$key] = $value;
        }

        self::assertSame([
            'user1' => ['name' => 'Alice'],
            'user2' => ['name' => 'Bob'],
        ], $result);
    }
}
