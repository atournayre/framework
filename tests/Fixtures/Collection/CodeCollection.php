<?php

declare(strict_types=1);

namespace Atournayre\Tests\Fixtures\Collection;

use Atournayre\Contracts\Collection\AsListInterface;
use Atournayre\Contracts\Collection\AsMapInterface;
use Atournayre\Contracts\Collection\MapInterface;
use Atournayre\Contracts\Collection\MergeInterface;
use Atournayre\Contracts\Collection\SetInterface;
use Atournayre\Contracts\Collection\ToArrayInterface;
use Atournayre\Primitives\StringType;
use Atournayre\Primitives\Traits\Collection;
use Atournayre\Primitives\Traits\Collection\Join;
use Atournayre\Primitives\Traits\Collection\Map;
use Atournayre\Primitives\Traits\Collection\Merge;
use Atournayre\Primitives\Traits\Collection\Set;
use Atournayre\Primitives\Traits\Collection\ToArray;

final class CodeCollection implements AsMapInterface, AsListInterface, MergeInterface, SetInterface, MapInterface, ToArrayInterface
{
    use Collection;
    use Set;
    use Merge;
    use Map;
    use ToArray;
    use Join;

    /**
     * @param array<int|string,mixed> $collection
     */
    public static function asMap(array $collection = []): self
    {
        $collection = [
            'key1' => StringType::of('value1'),
            'key2' => StringType::of('value2'),
        ];

        return self::of($collection);
    }

    /**
     * @param array<int|string,mixed> $collection
     */
    public static function asList(array $collection = []): self
    {
        $collection = [
            StringType::of('value1'),
            StringType::of('value2'),
        ];

        return self::of($collection);
    }
}
