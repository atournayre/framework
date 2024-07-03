<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Primitives;

use Atournayre\Primitives\Uuid;
use PHPUnit\Framework\TestCase;

final class UuidTest extends TestCase
{
    public function testFromString(): void
    {
        $uuid = Uuid::of('00000000-0000-0000-0000-000000000000');
        self::assertSame('00000000-0000-0000-0000-000000000000', $uuid->toString());
        self::assertTrue($uuid->equalsTo(Uuid::of('00000000-0000-0000-0000-000000000000'))->isTrue());
        self::assertTrue($uuid->toRfc4122()->equalsTo('00000000-0000-0000-0000-000000000000')->isTrue());
    }
}
