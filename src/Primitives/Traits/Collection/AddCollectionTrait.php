<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait AddCollectionTrait.
 */
trait AddCollectionTrait
{
    use ConcatCollectionTrait;
    use InsertAfterCollectionTrait;
    use InsertAtCollectionTrait;
    use InsertBeforeCollectionTrait;
    use MergeCollectionTrait;
    use PadCollectionTrait;
    use PrependCollectionTrait;
    use PushCollectionTrait;
    use PutCollectionTrait;
    use SetCollectionTrait;
    use UnionCollectionTrait;
    use UnshiftCollectionTrait;
    use WithCollectionTrait;
}
