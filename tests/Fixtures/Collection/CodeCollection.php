<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures\Collection;

use Atournayre\Contracts\Collection\ListInterface;
use Atournayre\Contracts\Collection\MapInterface;
use Atournayre\Primitives\Collection;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\StaticCollectionTrait;

final class CodeCollection implements MapInterface, ListInterface
{
    use StaticCollectionTrait;

    public static function asMap(array $collection = []): self
    {
        $collection = [
            'key1' => StringType::of('value1'),
            'key2' => StringType::of('value2'),
        ];

        return new self(Collection::of($collection));
    }

    public static function asList(array $collection = []): self
    {
        $collection = [
            StringType::of('value1'),
            StringType::of('value2'),
        ];

        return new self(Collection::of($collection));
    }

    public function join(string $glue = ''): string
    {
        return $this->collection
            ->join($glue);
    }
}
