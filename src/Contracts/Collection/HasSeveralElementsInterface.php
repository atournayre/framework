<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface HasSeveralElementsInterface.
 */
interface HasSeveralElementsInterface
{
    public function hasSeveralElements(): BoolEnum;
}
