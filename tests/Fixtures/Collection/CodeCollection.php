<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures\Collection;

use Atournayre\Contracts\Collection\ListInterface;
use Atournayre\Contracts\Collection\MapCollectionInterface;
use Atournayre\Contracts\Collection\MapInterface;
use Atournayre\Contracts\Collection\MergeCollectionInterface;
use Atournayre\Contracts\Collection\SetCollectionInterface;
use Atournayre\Contracts\Collection\ToArrayCollectionInterface;
use Atournayre\Primitives\AbstractCollection;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\Collection\JoinCollectionTrait;
use Atournayre\Primitives\Traits\Collection\MapCollectionTrait;
use Atournayre\Primitives\Traits\Collection\MergeCollectionTrait;
use Atournayre\Primitives\Traits\Collection\SetCollectionTrait;
use Atournayre\Primitives\Traits\Collection\ToArrayCollectionTrait;

final class CodeCollection extends AbstractCollection implements MapInterface, ListInterface, MergeCollectionInterface, SetCollectionInterface, MapCollectionInterface, ToArrayCollectionInterface
{
    use SetCollectionTrait;
    use MergeCollectionTrait;
    use MapCollectionTrait;
    use ToArrayCollectionTrait;
    use JoinCollectionTrait;

    public static function asMap(array $collection = []): self
    {
        $collection = [
            'key1' => StringType::of('value1'),
            'key2' => StringType::of('value2'),
        ];

        return self::of($collection);
    }

    public static function asList(array $collection = []): self
    {
        $collection = [
            StringType::of('value1'),
            StringType::of('value2'),
        ];

        return self::of($collection);
    }
}
