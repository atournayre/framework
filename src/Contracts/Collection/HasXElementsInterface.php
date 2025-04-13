<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Collection;

use Atournayre\Primitives\BoolEnum;

/**
 * Interface HasXElementsInterface.
 */
interface HasXElementsInterface
{
    public function hasXElements(int $int): BoolEnum;
}
