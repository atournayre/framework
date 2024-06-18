<?php

declare(strict_types=1);

namespace Atournayre\Component\Null\Tests;

use Atournayre\Tests\Fixtures\Title;
use PHPUnit\Framework\TestCase;

final class NullTest extends TestCase
{
    public function testNull(): void
    {
        $title = Title::asNull();

        self::assertTrue($title->isNull());
    }

    public function testNotNull(): void
    {
        $title = Title::create('My title');

        self::assertFalse($title->isNull());
        self::assertTrue($title->isNotNull());
    }

    public function testNullValue(): void
    {
        $title = Title::asNull();

        self::assertEquals('Empty title', $title->title);
    }

    public function testNotNullValue(): void
    {
        $title = Title::create('My title');

        self::assertEquals('My title', $title->title);
    }

    public function testNullable(): void
    {
        $title = Title::create('My title');

        self::assertFalse($title->isNull());

        $title = $title->toNullable();

        self::assertTrue($title->isNull());
    }

    public function testGetOrNull(): void
    {
        $title = Title::asNull();
        self::assertTrue($title->orNull()->isNull());
        self::assertSame('Empty title', $title->orNull()->title);

        $title = Title::create('My title');
        self::assertTrue($title->orNull()->isNotNull());
        self::assertSame('My title', $title->orNull()->title);
    }

    /**
     * @throws \Throwable
     */
    public function testOrThrow(): void
    {
        $title = Title::asNull();
        self::expectException(\RuntimeException::class);
        $title->orThrow(new \RuntimeException());
    }

    /**
     * @throws \Throwable
     */
    public function testOrThrowWithCallable(): void
    {
        $title = Title::asNull();
        self::expectException(\RuntimeException::class);
        $title->orThrow(function () {
            return new \RuntimeException();
        });
    }
}
