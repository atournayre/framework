<?php

declare(strict_types=1);

namespace Atournayre\Primitives;

use Atournayre\Primitives\Traits\Collection\AccessCollectionTrait;
use Atournayre\Primitives\Traits\Collection\AddCollectionTrait;
use Atournayre\Primitives\Traits\Collection\AggregateCollectionTrait;
use Atournayre\Primitives\Traits\Collection\CountableCollectionTrait;
use Atournayre\Primitives\Traits\Collection\CreateCollectionTrait;
use Atournayre\Primitives\Traits\Collection\DebugCollectionTrait;
use Atournayre\Primitives\Traits\Collection\MiscCollectionTrait;
use Atournayre\Primitives\Traits\Collection\OrderingCollectionTrait;
use Atournayre\Primitives\Traits\Collection\ShortenCollectionTrait;
use Atournayre\Primitives\Traits\Collection\TestCollectionTrait;
use Atournayre\Primitives\Traits\Collection\TransformCollectionTrait;

final class Collection extends AbstractCollection
{
    use AccessCollectionTrait;
    use AddCollectionTrait;
    use AggregateCollectionTrait;
    use CountableCollectionTrait;
    use CreateCollectionTrait;
    use DebugCollectionTrait;
    use MiscCollectionTrait;
    use OrderingCollectionTrait;
    use ShortenCollectionTrait;
    use TestCollectionTrait;
    use TransformCollectionTrait;
}
