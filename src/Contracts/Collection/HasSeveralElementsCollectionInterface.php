<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface HasSeveralElementsCollectionInterface.
 */
interface HasSeveralElementsCollectionInterface
{
    public function hasSeveralElements(): BoolEnum;
}
