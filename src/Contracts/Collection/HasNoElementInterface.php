<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface HasNoElementInterface.
 */
interface HasNoElementInterface
{
    public function hasNoElement(): BoolEnum;
}
