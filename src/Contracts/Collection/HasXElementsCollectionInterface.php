<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface HasXElementsCollectionInterface.
 */
interface HasXElementsCollectionInterface
{
    public function hasXElements(int $int): BoolEnum;
}
