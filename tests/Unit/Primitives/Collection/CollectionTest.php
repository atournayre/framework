<?php

declare(strict_types=1);

namespace Atournayre\Tests\Primitives\Collection;

use Atournayre\Tests\Fixtures\Collection\PriceCollection;
use Atournayre\Tests\Fixtures\Price;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testRewriteKeys(): void
    {
        $collection = PriceCollection::asList([Price::fromInt(1, 2)], 2)
            ->rekey(static fn ($value, int $key) => $key + 10)
        ;

        self::assertSame([10], $collection->keys());
    }
}
