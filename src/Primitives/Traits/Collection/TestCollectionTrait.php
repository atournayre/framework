<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait TestCollectionTrait.
 */
trait TestCollectionTrait
{
    use CompareCollectionTrait;
    use ContainsCollectionTrait;
    use EachCollectionTrait;
    use EmptyCollectionTrait;
    use EqualsCollectionTrait;
    use EveryCollectionTrait;
    use HasCollectionTrait;
    use IfCollectionTrait;
    use IfAnyCollectionTrait;
    use IfEmptyCollectionTrait;
    use InCollectionTrait;
    use IncludesCollectionTrait;
    use IsCollectionTrait;
    use IsEmptyCollectionTrait;
    use IsNumericCollectionTrait;
    use IsObjectCollectionTrait;
    use IsScalarCollectionTrait;
    use ImplementsCollectionTrait;
    use NoneCollectionTrait;
    use SomeCollectionTrait;
    use StrContainsCollectionTrait;
    use StrContainsAllCollectionTrait;
    use StrEndsCollectionTrait;
    use StrEndsAllCollectionTrait;
    use StrStartsCollectionTrait;
    use StrStartsAllCollectionTrait;
    use StrBeforeCollectionTrait;
}
