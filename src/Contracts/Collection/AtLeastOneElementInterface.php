<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface AtLeastOneElementInterface.
 */
interface AtLeastOneElementInterface
{
    public function atLeastOneElement(): BoolEnum;
}
