<?php

declare(strict_types=1);

namespace Atournayre\Tests\Unit\Common\Collection;

use Atournayre\Common\Collection\TemplateContextCollection;
use PHPUnit\Framework\TestCase;

final class TemplateContextCollectionTest extends TestCase
{
    public function testAsMapWithValidInput(): void
    {
        $input = [
            'key' => 'value',
            'date' => new \DateTime('204-06-23'),
        ];
        $collection = TemplateContextCollection::asMap($input);

        self::assertEquals($input, $collection->toArray());
    }
}
