<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures\Collection;

use Atournayre\Contracts\Collection\ListInterface;
use Atournayre\Contracts\Collection\MapInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\Traits\StaticCollectionTrait;

class CodeCollection implements MapInterface, ListInterface
{
    use StaticCollectionTrait;

    public static function asMap(array $collection = []): self
    {
        $collection = [
            'key1' => 'value1',
            'key2' => 'value2',
        ];

        return new self(Collection::of($collection));
    }

    public static function asList(array $collection = []): self
    {
        $collection = [
            'value1',
            'value2',
        ];

        return new self(Collection::of($collection));
    }
}
