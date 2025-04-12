<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait OrderingCollectionTrait.
 */
trait OrderingCollectionTrait
{
    use ArsortCollectionTrait;
    use AsortCollectionTrait;
    use KrsortCollectionTrait;
    use KsortCollectionTrait;
    use OrderCollectionTrait;
    use ReverseCollectionTrait;
    use RsortCollectionTrait;
    use ShuffleCollectionTrait;
    use SortCollectionTrait;
    use UasortCollectionTrait;
    use UksortCollectionTrait;
    use UsortCollectionTrait;
}
