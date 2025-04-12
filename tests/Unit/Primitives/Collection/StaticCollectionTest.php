<?php

declare(strict_types=1);

namespace Atournayre\Tests\Primitives\Collection;

use Atournayre\Primitives\StringType;
use Atournayre\Tests\Fixtures\Collection\CodeCollection;
use PHPUnit\Framework\TestCase;

class StaticCollectionTest extends TestCase
{
    public function testCreateMapWithoutParameters(): void
    {
        $staticCollection = CodeCollection::asMap()
            ->map(fn (StringType $value) => $value->toString())
            ->toArray()
        ;
        self::assertSame(['key1' => 'value1', 'key2' => 'value2'], $staticCollection);
    }

    public function testCreateListWithoutParameters(): void
    {
        $staticCollection = CodeCollection::asList()
            ->map(fn (StringType $value) => $value->toString())
            ->toArray()
        ;
        self::assertSame(['value1', 'value2'], $staticCollection);
    }

    public function testJoin(): void
    {
        $staticCollection = CodeCollection::asList();
        self::assertSame('value1value2', $staticCollection->join());
        self::assertSame('value1/value2', $staticCollection->join('/'));
        self::assertSame("value1', 'value2", $staticCollection->join("', '"));
    }
}
