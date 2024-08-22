<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\Traits;

use Atournayre\Tests\Fixtures\Title;
use PHPUnit\Framework\TestCase;

final class IsTraitTest extends TestCase
{
    public function testIs(): void
    {
        $object = Title::create('Title');

        self::assertTrue($object->is($object)->asBool());
    }

    public function testIsNot(): void
    {
        $object = Title::create('Title');
        $object2 = Title::create('Title 2');

        self::assertTrue($object->isNot($object2)->asBool());
    }
}
