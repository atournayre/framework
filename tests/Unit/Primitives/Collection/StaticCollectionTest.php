<?php

declare(strict_types=1);

namespace Atournayre\Tests\Primitives\Collection;

use Atournayre\Tests\Fixtures\Collection\CodeCollection;
use PHPUnit\Framework\TestCase;

class StaticCollectionTest extends TestCase
{
    public function testCreateMapWithoutParameters(): void
    {
        $staticCollection = CodeCollection::asMap();
        self::assertSame(['key1' => 'value1', 'key2' => 'value2'], $staticCollection->toArray());
    }

    public function testCreateListWithoutParameters(): void
    {
        $staticCollection = CodeCollection::asList();
        self::assertSame(['value1', 'value2'], $staticCollection->toArray());
    }

    public function testOffsetUnsetThrowsException(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Static collections cannot be modified.');
        $collection = CodeCollection::asList();
        $collection->offsetUnset(0);
    }

    public function testStaticCollectionAddThrowsException(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Static collections cannot be modified.');
        $collection = CodeCollection::asList();
        $collection->add('foo');
    }

    public function testStaticCollectionSetThrowsException(): void
    {
        $this->expectException(\BadMethodCallException::class);
        $this->expectExceptionMessage('Static collections cannot be modified.');
        $collection = CodeCollection::asList();
        $collection->set(0, 'foo');
    }
}
