<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait CountableCollectionTrait.
 */
trait CountableCollectionTrait
{
    use CountCollectionTrait;
    use CountByCollectionTrait;
    use AtLeastOneElementCollectionTrait;
    use HasSeveralElementsCollectionTrait;
    use HasNoElementCollectionTrait;
    use HasOneElementCollectionTrait;
    use HasXElementsCollectionTrait;
}
