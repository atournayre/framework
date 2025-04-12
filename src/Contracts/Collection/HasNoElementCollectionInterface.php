<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface HasNoElementCollectionInterface.
 */
interface HasNoElementCollectionInterface
{
    public function hasNoElement(): BoolEnum;
}
