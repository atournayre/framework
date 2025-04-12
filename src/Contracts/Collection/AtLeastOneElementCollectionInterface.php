<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface AtLeastOneElementCollectionInterface.
 */
interface AtLeastOneElementCollectionInterface
{
    public function atLeastOneElement(): BoolEnum;
}
