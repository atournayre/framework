<?php

declare(strict_types=1);

namespace Atournayre\Primitives\Traits\Collection;

/**
 * Trait DebugCollectionTrait.
 */
trait DebugCollectionTrait
{
    use DdCollectionTrait;
    use DumpCollectionTrait;
    use TapCollectionTrait;
}
