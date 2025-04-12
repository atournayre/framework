<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait ShortenCollectionTrait.
 */
trait ShortenCollectionTrait
{
    use AfterCollectionTrait;
    use BeforeCollectionTrait;
    use ClearCollectionTrait;
    use DiffCollectionTrait;
    use DiffAssocCollectionTrait;
    use DiffKeysCollectionTrait;
    use ExceptCollectionTrait;
    use FilterCollectionTrait;
    use GrepCollectionTrait;
    use IntersectCollectionTrait;
    use IntersectAssocCollectionTrait;
    use IntersectKeysCollectionTrait;
    use NthCollectionTrait;
    use OnlyCollectionTrait;
    use RejectCollectionTrait;
    use RemoveCollectionTrait;
    use SkipCollectionTrait;
    use SliceCollectionTrait;
    use TakeCollectionTrait;
    use WhereCollectionTrait;
}
