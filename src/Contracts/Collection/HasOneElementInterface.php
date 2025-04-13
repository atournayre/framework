<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface HasOneElementInterface.
 */
interface HasOneElementInterface
{
    public function hasOneElement(): BoolEnum;
}
