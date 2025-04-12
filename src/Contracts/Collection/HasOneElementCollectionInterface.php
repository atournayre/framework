<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface HasOneElementCollectionInterface.
 */
interface HasOneElementCollectionInterface
{
    public function hasOneElement(): BoolEnum;
}
