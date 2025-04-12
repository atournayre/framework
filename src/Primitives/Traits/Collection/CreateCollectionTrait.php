<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait CreateCollectionTrait.
 */
trait CreateCollectionTrait
{
    use CloneCollectionTrait;
    use CopyCollectionTrait;
    use ExplodeCollectionTrait;
    use FromCollectionTrait;
    use FromJsonCollectionTrait;
    use TreeCollectionTrait;
}
